// src/pages/Bookings/BookingsPage.jsx
import { useEffect, useState } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { fetchBookings } from '../../modules/Products/slice';
import {
  selectAllBookings,
  selectBookingsLoading,
  selectBookingsError
} from '../../modules/Products/slice';
import { format } from 'date-fns';
import { vi } from 'date-fns/locale';
import {
  Container,
  Row,
  Col,
  Table,
  Spinner,
  Alert,
  Badge,
  Nav,
  Card
} from 'react-bootstrap';
import { Calendar, CarFront, ClipboardCheck, XCircle, Clock } from 'lucide-react';


const statusStyles = {
  pending: { bg: 'warning', text: 'Chờ xác nhận', icon: <Clock size={16} /> },
  confirmed: { bg: 'success', text: 'Đã xác nhận', icon: <ClipboardCheck size={16} /> },
  cancelled: { bg: 'danger', text: 'Đã hủy', icon: <XCircle size={16} /> },
  completed: { bg: 'info', text: 'Đã hoàn thành', icon: <CarFront size={16} /> },
};

const BookingsPage = () => {
  const dispatch = useDispatch();
  const bookings = useSelector(selectAllBookings);
  const loading = useSelector(selectBookingsLoading);
  const error = useSelector(selectBookingsError);

  const [filterStatus, setFilterStatus] = useState('all');

  useEffect(() => {
    dispatch(fetchBookings());
  }, [dispatch]);

  const filteredBookings =
    filterStatus === 'all'
      ? bookings
      : bookings.filter((booking) => booking.status === filterStatus);

  return (
    <Container className="my-5">
      <Row>
        <Col>
          <h1 className="fw-bold mb-4 text-center">
            <CarFront className="me-2 text-primary" size={32} />
            Lịch sử đặt chỗ của bạn
          </h1>

          {/* Tabs lọc trạng thái */}
          <Card className="shadow-sm border-0 rounded-3 mb-4">
            <Card.Body>
              <Nav variant="pills" className="justify-content-center gap-2">
                <Nav.Item>
                  <Nav.Link
                    active={filterStatus === 'all'}
                    onClick={() => setFilterStatus('all')}
                  >
                    Tất cả
                  </Nav.Link>
                </Nav.Item>
                <Nav.Item>
                  <Nav.Link
                    active={filterStatus === 'pending'}
                    onClick={() => setFilterStatus('pending')}
                  >
                    Chờ xác nhận
                  </Nav.Link>
                </Nav.Item>
                <Nav.Item>
                  <Nav.Link
                    active={filterStatus === 'confirmed'}
                    onClick={() => setFilterStatus('confirmed')}
                  >
                    Đã xác nhận
                  </Nav.Link>
                </Nav.Item>
                <Nav.Item>
                  <Nav.Link
                    active={filterStatus === 'completed'}
                    onClick={() => setFilterStatus('completed')}
                  >
                    Đã hoàn thành
                  </Nav.Link>
                </Nav.Item>
                <Nav.Item>
                  <Nav.Link
                    active={filterStatus === 'cancelled'}
                    onClick={() => setFilterStatus('cancelled')}
                  >
                    Đã hủy
                  </Nav.Link>
                </Nav.Item>
              </Nav>
            </Card.Body>
          </Card>

          {/* Loading + Error */}
          {loading && (
            <div className="text-center my-5">
              <Spinner animation="border" variant="primary" />
              <p className="mt-2">Đang tải dữ liệu...</p>
            </div>
          )}
          {error && <Alert variant="danger">{error}</Alert>}

          {/* Bảng đặt lịch */}
          {!loading && !error && (
            <Card className="shadow-sm border-0 rounded-4">
              <Card.Body>
                <Table hover responsive className="align-middle mb-0">
                  <thead className="table-light">
                    <tr>
                      <th>#</th>
                      <th>Sản phẩm</th>
                      <th>Ngày đặt</th>
                      <th>Giờ đặt</th>
                      <th>Trạng thái</th>
                      <th>Tổng giá</th>
                      <th>Ghi chú</th>
                    </tr>
                  </thead>
                  <tbody>
                    {filteredBookings.length > 0 ? (
                      filteredBookings.map((booking, index) => (
                        <tr key={booking.id}>
                          <td className="fw-semibold">{index + 1}</td>
                          <td>{booking.product?.name || 'N/A'}</td>
                          <td>
                            {format(new Date(booking.booking_date), 'dd/MM/yyyy', {
                              locale: vi,
                            })}
                          </td>
                          <td>
                            {booking.booking_time
                              ? format(new Date(`1970-01-01T${booking.booking_time}`), 'HH:mm')
                              : 'N/A'}
                          </td>
                          <td>
                            <Badge
                              bg={statusStyles[booking.status]?.bg || 'secondary'}
                              pill
                              className="d-flex align-items-center gap-1"
                            >
                              {statusStyles[booking.status]?.icon}
                              {statusStyles[booking.status]?.text || booking.status}
                            </Badge>
                          </td>
                          <td>
                            {booking.total_price
                              ? `${Number(booking.total_price).toLocaleString('vi-VN')} ₫`
                              : 'N/A'}
                          </td>
                          <td>{booking.notes || 'Không có'}</td>
                        </tr>
                      ))
                    ) : (
                      <tr>
                        <td colSpan="7" className="text-center py-5 text-muted">
                          <Calendar  size={32} className="mb-2" />
                          <p className="mb-0">Bạn chưa có lịch đặt nào.</p>
                        </td>
                      </tr>
                    )}
                  </tbody>
                </Table>
              </Card.Body>
            </Card>
          )}
        </Col>
      </Row>
    </Container>
  );
};

export default BookingsPage;
