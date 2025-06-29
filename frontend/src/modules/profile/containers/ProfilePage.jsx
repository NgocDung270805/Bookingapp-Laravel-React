// src/modules/profile/containers/ProfilePage.jsx

import React, { useEffect, useState } from 'react';
import { useAppDispatch, useAppSelector } from '../../../appRedux';
import { fetchUserProfile, updateUserProfile } from '../slice';
import { useAuth } from '../../../hooks/useAuth';
import { GENDER_TYPES } from '../../../common/constants'; // Import GENDER_TYPES nếu cần

const ProfilePage = () => {
  const dispatch = useAppDispatch();
  const { user } = useAuth(); // Lấy user từ hook useAuth
  const { profileData, loading, error } = useAppSelector((state) => state.profile);

  // States cục bộ để quản lý dữ liệu form
  const [name, setName] = useState(user?.name || '');
  const [email, setEmail] = useState(user?.email || '');
  const [phone, setPhone] = useState('');
  const [address, setAddress] = useState('');
  const [gender, setGender] = useState('');
  const [bio, setBio] = useState('');
  const [avatarFile, setAvatarFile] = useState(null);

  // useEffect để fetch profile data khi component mount hoặc user thay đổi
  useEffect(() => {
    // Chỉ fetch profile nếu user đã đăng nhập và profileData chưa có
    if (user && !profileData) {
      dispatch(fetchUserProfile());
    }
  }, [dispatch, user, profileData]);

  // useEffect để cập nhật state cục bộ khi profileData thay đổi từ Redux
  useEffect(() => {
    if (profileData) {
      setName(profileData.name || '');
      setEmail(profileData.email || '');
      setPhone(profileData.profile?.phone || '');
      setAddress(profileData.profile?.address || '');
      setGender(profileData.profile?.gender || '');
      setBio(profileData.profile?.bio || '');
    }
  }, [profileData]);

  const handleSubmit = async (e) => {
    e.preventDefault();
    const updateData = {
      name,
      email,
      phone: phone || null,
      address: address || null,
      gender: gender || null,
      bio: bio || null,
      // ... thêm các trường khác từ profile và details bạn muốn cập nhật
    };

    if (avatarFile) {
      updateData.avatar = avatarFile;
    }

    const resultAction = await dispatch(updateUserProfile(updateData));
    if (updateUserProfile.fulfilled.match(resultAction)) {
      alert('Cập nhật hồ sơ thành công!'); // Hoặc dùng notification UI
    }
    // Lỗi sẽ được hiển thị qua `error` state từ Redux
  };

  if (loading) {
    return <div>Đang tải hồ sơ...</div>;
  }

  if (error) {
    return <div style={{ color: 'red' }}>Lỗi: {error}</div>;
  }

  // Nếu user hoặc profileData chưa load xong
  if (!user || !profileData) {
    return <div>Không tìm thấy thông tin hồ sơ hoặc chưa tải xong.</div>;
  }

  return (
    <div style={{ padding: '20px', maxWidth: '600px', margin: 'auto', border: '1px solid #ccc', borderRadius: '8px' }}>
      <h2>Hồ sơ của tôi</h2>
      <form onSubmit={handleSubmit}>
        <div>
          <label htmlFor="name">Tên:</label>
          <input type="text" id="name" value={name} onChange={(e) => setName(e.target.value)} required />
        </div>
        <div>
          <label htmlFor="email">Email:</label>
          <input type="email" id="email" value={email} onChange={(e) => setEmail(e.target.value)} required />
        </div>
        {/* Các trường từ users_profiles */}
        <div>
          <label htmlFor="phone">Điện thoại:</label>
          <input type="text" id="phone" value={phone} onChange={(e) => setPhone(e.target.value)} />
        </div>
        <div>
          <label htmlFor="address">Địa chỉ:</label>
          <input type="text" id="address" value={address} onChange={(e) => setAddress(e.target.value)} />
        </div>
        <div>
          <label htmlFor="gender">Giới tính:</label>
          <select id="gender" value={gender} onChange={(e) => setGender(e.target.value)}>
            <option value="">Chọn giới tính</option>
            <option value={GENDER_TYPES.MALE}>Nam</option>
            <option value={GENDER_TYPES.FEMALE}>Nữ</option>
            <option value={GENDER_TYPES.OTHER}>Khác</option>
          </select>
        </div>
        <div>
          <label htmlFor="bio">Mô tả bản thân:</label>
          <textarea id="bio" value={bio} onChange={(e) => setBio(e.target.value)} rows="4" />
        </div>
        <div>
          <label htmlFor="avatar">Ảnh đại diện:</label>
          <input type="file" id="avatar" onChange={(e) => setAvatarFile(e.target.files ? e.target.files[0] : null)} />
          {profileData.profile?.avatar && (
            <img src={`http://localhost:8000/storage/${profileData.profile.avatar}`} alt="Avatar hiện tại" style={{ width: '80px', height: '80px', borderRadius: '50%', objectFit: 'cover', marginTop: '10px' }} />
          )}
        </div>
        {/* Các trường từ user_details có thể thêm tương tự */}

        <button type="submit">Cập nhật hồ sơ</button>
      </form>

      {profileData.details && (
        <div style={{ marginTop: '20px', borderTop: '1px solid #eee', paddingTop: '15px' }}>
          <h3>Chi tiết khác</h3>
          <p><strong>Số CCCD:</strong> {profileData.details.id_number}</p>
          <p><strong>Ngày cấp:</strong> {profileData.details.id_issued_date}</p>
          {/* ... các chi tiết khác từ profileData.details */}
        </div>
      )}
    </div>
  );
};

export default ProfilePage;