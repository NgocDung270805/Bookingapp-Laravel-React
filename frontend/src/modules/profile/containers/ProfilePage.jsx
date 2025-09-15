// src/modules/profile/containers/ProfilePage.jsx

import React, { useEffect, useState } from 'react';
import { useAppDispatch, useAppSelector } from '../../../appRedux';
import { fetchUserProfile, updateUserProfile } from '../slice';
import { useAuth } from '../../../hooks/useAuth';
import { GENDER_TYPES } from '../../../common/constants'; // Import GENDER_TYPES nếu cần
import { PATHS } from '../../../common/constants';
import VerifiedBadge from '../../../core/components/VerifiedBadge';
import LoadingIndicator from '../../../core/components/LoadingIndicator';
import ErrorIndicator from '../../../core/components/ErrorIndicator';
import { toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';

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
      toast.success('Cập nhật hồ sơ thành công!');
    }
    // Lỗi sẽ được hiển thị qua `error` state từ Redux
  };

  if (loading) {
    return <LoadingIndicator />;
  }

  if (error) {
    return <ErrorIndicator />;
  }

  // Nếu user hoặc profileData chưa load xong
  if (!user || !profileData) {
    return <div>Không tìm thấy thông tin hồ sơ hoặc chưa tải xong.</div>;
  }

  return (
    <div className="container-fluid mt-5">
      <div className="row">
        <div className="col-lg-4 mb-4">
          <div className="card shadow-sm">
            <div className="card-body text-center">
              <img
                src=
                {
                  profileData?.profile?.avatar
                    ? `${PATHS.ADMIN_DASHBOARD}storage/${profileData.profile.avatar}`
                    : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSkgjgrCNlnMAjfAJmzC9Q8OGQKwKQpq3HtUQ&s'
                }
                className="rounded-circle mb-3"
                alt=""
                style={{ width: '150px', height: '150px', objectFit: 'cover' }}
              />
              <h3 className="card-title">{profileData.name}{profileData.is_verified === 1 && <VerifiedBadge />}</h3>
              <p className="text-muted">{profileData.email}</p>
              <p className="card-text">
                <i className="bi bi-geo-alt-fill me-2"></i>
                {profileData.profile?.address ? (
                  profileData.profile.address
                ) : (
                  <span className="text-warning">Chưa cập nhật địa chỉ</span>
                )}
              </p>
              <p className="card-text">
                {profileData.profile?.bio ? (
                  profileData.profile.bio
                ) : (
                  <span className="text-warning">Chưa có mô tả bản thân.</span>
                )}
              </p>
            </div>
          </div>
        </div>

        {/* Cột phải: Form chỉnh sửa thông tin */}
        <div className="col-lg-8">
          <div className="card shadow-sm">
            <div className="card-header bg-primary text-white">
              <h5 className="mb-0 text-white">Chỉnh sửa hồ sơ</h5>
            </div>
            <div className="card-body">
              <form onSubmit={handleSubmit}>
                <h6 className="text-muted mb-3">Thông tin người dùng</h6>
                <div className="row mb-3">
                  <div className="col-md-6">
                    <label htmlFor="input-name" className="form-label">Tên:</label>
                    <input
                      type="text"
                      id="input-name"
                      className="form-control"
                      placeholder="Tên của bạn"
                      value={name}
                      onChange={(e) => setName(e.target.value)}
                      required
                    />
                  </div>
                  <div className="col-md-6">
                    <label htmlFor="input-email" className="form-label">Email:</label>
                    <input
                      type="email"
                      id="input-email"
                      className="form-control"
                      placeholder="email@gmail.com"
                      value={email}
                      onChange={(e) => setEmail(e.target.value)}
                      required
                    />
                  </div>
                </div>

                <div className="row mb-3">
                  <div className="col-md-6">
                    <label htmlFor="input-phone" className="form-label">Điện thoại:</label>
                    <input
                      type="text"
                      id="input-phone"
                      className="form-control"
                      placeholder="Số điện thoại"
                      value={phone}
                      onChange={(e) => setPhone(e.target.value)}
                    />
                  </div>
                  <div className="col-md-6">
                    <label htmlFor="input-gender" className="form-label">Giới tính:</label>
                    <select
                      id="input-gender"
                      className="form-select"
                      value={gender}
                      onChange={(e) => setGender(e.target.value)}
                    >
                      <option value="">Chọn giới tính</option>
                      <option value={GENDER_TYPES.MALE}>Nam</option>
                      <option value={GENDER_TYPES.FEMALE}>Nữ</option>
                      <option value={GENDER_TYPES.OTHER}>Khác</option>
                    </select>
                  </div>
                </div>

                <div className="mb-3">
                  <label htmlFor="input-address" className="form-label">Địa chỉ:</label>
                  <input
                    type="text"
                    id="input-address"
                    className="form-control"
                    placeholder="Địa chỉ của bạn"
                    value={address}
                    onChange={(e) => setAddress(e.target.value)}
                  />
                </div>

                <div className="mb-3">
                  <label htmlFor="input-bio" className="form-label">Mô tả bản thân:</label>
                  <textarea
                    id="input-bio"
                    className="form-control"
                    rows="3"
                    placeholder="Một vài lời về bạn..."
                    value={bio}
                    onChange={(e) => setBio(e.target.value)}
                  ></textarea>
                </div>

                <div className="mb-3">
                  <label htmlFor="input-avatar" className="form-label">Ảnh đại diện:</label>
                  <input
                    type="file"
                    id="input-avatar"
                    className="form-control"
                    onChange={(e) => setAvatarFile(e.target.files ? e.target.files[0] : null)}
                  />
                </div>

                <div className="d-grid gap-2">
                  <button type="submit" className="btn btn-success">
                    Cập nhật hồ sơ
                  </button>
                </div>
              </form>

              {/* Phần thông tin chi tiết khác (CCCD) */}
              {profileData.details && (
                <>
                  <hr className="my-4" />
                  <h6 className="text-muted mb-3">Thông tin chi tiết khác</h6>
                  <div className="row">
                    <div className="col-md-6 mb-3">
                      <label className="form-label">Số CCCD:</label>
                      <p className="form-control-plaintext">{profileData.details.id_number || 'Chưa cập nhật'}</p>
                    </div>
                    <div className="col-md-6 mb-3">
                      <label className="form-label">Ngày cấp:</label>
                      <p className="form-control-plaintext">{profileData.details.id_issued_date || 'Chưa cập nhật'}</p>
                    </div>
                  </div>
                  {/* Bạn có thể thêm các trường chi tiết khác tại đây */}
                </>
              )}
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default ProfilePage;