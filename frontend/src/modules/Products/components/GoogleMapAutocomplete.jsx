import React, { useState, useEffect, useRef } from 'react';
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

  // Search states
  const [query, setQuery] = useState('');
  const [suggestions, setSuggestions] = useState([]);
  const [loadingSuggestions, setLoadingSuggestions] = useState(false);
  const [showSuggestions, setShowSuggestions] = useState(false);
  const searchTimeout = useRef(null);
  const inputRef = useRef(null);

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

  // Debounced search for suggestions
  useEffect(() => {
    if (searchTimeout.current) clearTimeout(searchTimeout.current);
    if (!query || query.trim().length < 3) {
      setSuggestions([]);
      setShowSuggestions(false);
      return;
    }

    setLoadingSuggestions(true);
    searchTimeout.current = setTimeout(async () => {
      try {
        const url = `https://nominatim.openstreetmap.org/search?format=json&addressdetails=1&limit=5&q=${encodeURIComponent(query)}`;
        const res = await fetch(url);
        const data = await res.json();
        setSuggestions(data || []);
        setShowSuggestions(true);
      } catch (err) {
        console.error('Search error:', err);
        setSuggestions([]);
      } finally {
        setLoadingSuggestions(false);
      }
    }, 500);

    return () => clearTimeout(searchTimeout.current);
  }, [query]);

  const handleSelect = (item) => {
    const lat = parseFloat(item.lat);
    const lon = parseFloat(item.lon);
    setPosition([lat, lon]);
    setAddress(item.display_name);
    setQuery('');
    setSuggestions([]);
    setShowSuggestions(false);

    const formattedAddress = {
      address_line: item.display_name,
      ward: item.address && (item.address.suburb || item.address.neighbourhood) || '',
      district: item.address && (item.address.city_district || item.address.county || item.address.state_district) || '',
      city: item.address && (item.address.city || item.address.state || item.address.town) || '',
    };

    onPlaceSelect(formattedAddress);
  };

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
    <div className="location-picker" style={{ position: 'relative' }}>
      <div style={{ marginBottom: 8 }}>
        <input
          ref={inputRef}
          type="text"
          className="form-control"
          placeholder="Tìm địa điểm..."
          value={query}
          onChange={(e) => setQuery(e.target.value)}
          onFocus={() => { if (suggestions.length) setShowSuggestions(true); }}
        />
        {showSuggestions && (
          <div style={{
            position: 'absolute',
            zIndex: 9999,
            background: '#fff',
            width: '100%',
            maxHeight: 200,
            overflowY: 'auto',
            border: '1px solid #ddd',
            borderRadius: 4,
            marginTop: 4,
          }}>
            {loadingSuggestions && <div style={{ padding: 8 }}>Đang tìm...</div>}
            {!loadingSuggestions && suggestions.length === 0 && <div style={{ padding: 8 }}>Không có kết quả</div>}
            {!loadingSuggestions && suggestions.map((item) => (
              <div
                key={`${item.place_id}-${item.lat}-${item.lon}`}
                onClick={() => handleSelect(item)}
                style={{ padding: 8, cursor: 'pointer', borderBottom: '1px solid #f0f0f0' }}
              >
                {item.display_name}
              </div>
            ))}
          </div>
        )}
      </div>

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