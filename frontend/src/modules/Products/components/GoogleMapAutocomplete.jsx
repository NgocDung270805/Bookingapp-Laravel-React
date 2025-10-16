import React, { useState, useEffect } from 'react';
import { MapContainer, TileLayer, Marker, useMapEvents } from 'react-leaflet';
import 'leaflet/dist/leaflet.css';
import L from 'leaflet';

// Fix for default marker icons
delete L.Icon.Default.prototype._getIconUrl;
L.Icon.Default.mergeOptions({
  iconRetinaUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-icon-2x.png',
  iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-icon.png',
  shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
});

const LocationMapPicker = ({ onPlaceSelect }) => {
  const [position, setPosition] = useState([21.042105, 105.741330]); // mặc định là vị trí hiện tại
  const [address, setAddress] = useState('');

  useEffect(() => {
    if ("geolocation" in navigator) {
      navigator.geolocation.getCurrentPosition(
        async (pos) => {
          const newPos = [pos.coords.latitude, pos.coords.longitude];
          setPosition(newPos);
          
          try {
            const response = await fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${pos.coords.latitude}&lon=${pos.coords.longitude}`);
            const data = await response.json();
            
            const formattedAddress = {
              address_line: data.display_name,
              ward: data.address.suburb || '',
              district: data.address.city_district || data.address.district || '',
              city: data.address.city || data.address.state || '',
            };
            
            setAddress(data.display_name);
            onPlaceSelect(formattedAddress);
          } catch (error) {
            console.error('Error fetching address:', error);
          }
        },
        (error) => {
          console.error('Error getting location:', error);
        }
      );
    }
  }, []);

  const MapEvents = () => {
    useMapEvents({
      click: async (e) => {
        const { lat, lng } = e.latlng;
        setPosition([lat, lng]);
        
        try {
          const response = await fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`);
          const data = await response.json();
          
          const formattedAddress = {
            address_line: data.display_name,
            ward: data.address.suburb || '',
            district: data.address.city_district || data.address.district || '',
            city: data.address.city || data.address.state || '',
          };
          
          setAddress(data.display_name);
          onPlaceSelect(formattedAddress);
        } catch (error) {
          console.error('Error fetching address:', error);
        }
      },
    });
    return null;
  };

  return (
    <div className="location-picker">
      <MapContainer
        center={position}
        zoom={13}
        style={{ height: '400px', width: '100%', marginBottom: '10px' }}
      >
        <TileLayer
          url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
          attribution='&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        />
        <Marker position={position} />
        <MapEvents />
      </MapContainer>
      <input
        type="text"
        className="form-control"
        value={address}
        placeholder="Click vào bản đồ để chọn vị trí..."
        readOnly
      />
    </div>
  );
};

export default LocationMapPicker;