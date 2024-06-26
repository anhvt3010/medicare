-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 22, 2024 lúc 01:44 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `medicare_final`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `specialty_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `date_slot` int(11) DEFAULT NULL,
  `time_id` int(11) DEFAULT NULL,
  `patient_name` varchar(50) DEFAULT NULL,
  `patient_gender` tinyint(1) DEFAULT NULL,
  `patient_dob` date DEFAULT NULL,
  `patient_phone` varchar(11) DEFAULT NULL,
  `patient_email` varchar(150) DEFAULT NULL,
  `patient_description` varchar(500) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `result` varchar(500) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `patient_id`, `specialty_id`, `employee_id`, `date_slot`, `time_id`, `patient_name`, `patient_gender`, `patient_dob`, `patient_phone`, `patient_email`, `patient_description`, `status`, `result`, `update_at`, `update_by`, `created_at`) VALUES
(41, NULL, 1, 1, 19866, 5, 'Nguyễn Văn A', 1, '1985-10-27', '0900000001', 'user39@example.com', 'Sốt cao liên tục', 2, '', '2024-05-27 23:17:35', NULL, '2024-05-24 12:08:22'),
(42, NULL, 1, 2, 19888, 2, 'Trần Thị B', 1, '2020-03-28', '0900000002', 'ta@gmail.com', 'Ho khan kéo dài', 1, NULL, '2024-06-14 07:55:18', NULL, '2024-05-28 05:08:45'),
(43, NULL, 4, 23, 19871, 15, 'Lê Thanh C', 1, '2011-02-11', '0900000003', 'tham@gmail.com', 'Đau đầu dữ dội', 2, 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1717862996/zmznpyveugyr5lng6dro.pdf', '2024-06-08 23:09:57', NULL, '2024-05-28 05:57:10'),
(48, NULL, 3, 18, 19889, 15, 'Phạm Hoàng D', 1, '2002-10-30', '0900000004', 'ta@gmail.com', 'Đau bụng quặn thắt', 1, 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1717750877/zoghx4ta1wp3qeuldbqa.pdf', '2024-06-14 16:50:02', NULL, '2024-05-31 22:38:21'),
(70, NULL, 1, 1, 19888, 2, 'Hoàng Minh E', 0, '2002-10-30', '0900000005', 'user7@example.com', 'Đau ngực thắt lại', 1, NULL, '2024-06-14 18:22:22', NULL, '2024-06-13 06:08:17'),
(71, NULL, 1, 1, 19888, 11, 'Đặng Thu F', 1, '2002-10-30', '0900000006', 'tu@example.com', 'Khó thở từng cơn', 2, NULL, '2024-06-22 05:49:03', 67, '2024-06-13 06:12:49'),
(72, NULL, 1, 1, 19888, 15, 'Ngô Đức G', 1, '2020-10-30', '0900000007', 'user7@example.com', 'Buồn nôn khó chịu', 1, NULL, '2024-06-14 19:00:06', 2, '2024-06-13 06:13:49'),
(73, NULL, 1, 1, 19888, 13, 'Vũ Hải H', 0, '2002-10-30', '0900000008', 'user7@example.com', 'Nôn mửa thường xuyên', 2, NULL, '2024-06-22 05:49:38', 67, '2024-06-13 06:16:01'),
(74, NULL, 1, 1, 19888, 5, 'Đỗ Thị I', 1, '2002-10-30', '0900000009', 'user7@example.com', 'Chóng mặt quay cuồng', 2, NULL, '2024-06-20 01:17:14', 76, '2024-06-13 06:20:46'),
(75, NULL, 1, 2, 19888, 10, 'Bùi Văn J', 1, '2002-10-30', '0900000010', 'dan@example.com', 'Đau họng rát buốt', 1, NULL, '2024-06-20 01:25:10', 76, '2024-06-13 06:22:04'),
(76, NULL, 1, 1, 19888, 4, 'Phan Thanh K', 1, '2002-10-30', '0900000011', 'user7@example.com', 'Sổ mũi liên tục', 1, NULL, '2024-06-19 19:30:35', 76, '2024-06-13 06:22:56'),
(77, NULL, 3, 15, 19888, 3, 'Huỳnh Quốc L', 0, '2002-10-30', '0900000012', 'user12@example.com', 'Ho có đờm xanh', 1, NULL, '2024-06-16 18:09:41', 76, '2024-06-13 06:25:07'),
(78, NULL, 1, 1, 19888, 14, 'Dương Lan M', 1, '2002-10-30', '0900000013', 'user7@example.com', 'Đau lưng âm ỉ', 1, NULL, '2024-06-14 16:45:50', NULL, '2024-06-13 07:00:53'),
(84, 1, 5, 28, 19888, 12, 'Vũ Thị Thắm', 0, '2002-10-30', '0987654321', 'user23@example.com', 'Tiêu chảy cấp tính', 2, 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718277748/wkk41qqetovl2ordx8nh.pdf', '2024-06-22 05:49:23', 67, '2024-06-13 07:13:05'),
(85, 1, 1, 1, 19889, 10, 'Vũ Thị Thắm', 1, '2002-10-30', '0987654321', 'ta@gmail.com', 'Táo bón kéo dài', 2, 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718388374/gqfbm8glyg4std6abbxh.pdf', '2024-06-15 01:06:14', 1, '2024-06-14 08:57:36'),
(86, 1, 1, 1, 19896, 13, 'Vũ Thị Thắm', 1, '2002-05-23', '0987654321', 'tanh@gmail.comm', 'Phát ban ngứa ngáy', 1, NULL, '2024-06-22 05:50:44', 67, '2024-06-15 20:20:03'),
(87, NULL, 1, 1, 19896, 10, 'Tuấn Trần', 1, '2002-10-30', '0964444444', 'tuantran6@example.com', 'Ngứa khắp cơ thể', 1, 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718485226/nijbxtfe2tfichnx0r5r.pdf', '2024-06-22 05:50:19', 67, '2024-06-15 20:31:08'),
(88, 52, 5, 24, 19891, 10, 'Thùy Linh', 0, '2003-05-08', '0813966292', 'nguyenthuylinh852003@gmail.com', 'Chảy máu mũi tự nhiên', 2, 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718552917/mnoysrvj9xz343olhovx.pdf', '2024-06-18 09:55:08', 76, '2024-06-16 18:20:22'),
(89, NULL, 3, 3, 19896, 8, 'Thùy Linh', 0, '2023-02-17', '0813966291', 'nguyenthuylinh852003@gmail.com', 'Chảy máu chân răng', 1, NULL, '2024-06-22 05:51:22', 67, '2024-06-17 01:32:07'),
(90, 52, 4, 4, 19896, 13, 'Thùy Linh', 0, '2022-02-17', '0813966292', 'nguyenthuylinh852003@gmail.com', 'Mất vị giác đột ngột', 1, NULL, '2024-06-22 05:51:46', 67, '2024-06-17 01:33:52'),
(91, 52, 1, 2, 19897, 1, 'Nguyễn Thùy Linh', 0, '2003-05-08', '0813966292', 'nguyenthuylinh852003@gmail.com', 'Mất khứu giác đột ngột', 0, NULL, '2024-06-22 05:52:31', 67, '2024-06-17 01:34:31'),
(92, 52, 5, 24, 19899, 4, 'Nguyễn Thùy Linh', 0, '2003-05-08', '0813966292', 'nguyenthuylinh852003@gmail.com', 'Mệt mỏi không dứt', 0, NULL, '2024-06-22 05:52:57', 67, '2024-06-18 09:37:19'),
(93, 52, 1, 1, 19893, 15, 'Nguyễn Thùy Linh', 0, '2003-05-08', '0813966292', 'nguyenthuylinh852003@gmail.com', 'Khó ngủ triền miên', 1, NULL, '2024-06-18 15:44:33', 76, '2024-06-18 15:40:41'),
(98, 52, 5, 24, 19894, 12, 'Nguyễn Thùy Linh', 0, '2003-05-08', '0813966292', 'nguyenthuylinh852003@gmail.com', 'Sụt cân nhanh chóng', 1, NULL, '2024-06-20 16:08:45', 76, '2024-06-20 01:08:18'),
(99, 52, 1, 6, 19896, 1, 'Nguyễn Đức Anh', 1, '1959-06-20', '0813966292', 'ducco123@gmail.com', 'Tăng cân không kiểm soát', 1, NULL, '2024-06-22 05:49:53', 67, '2024-06-20 01:12:06'),
(100, NULL, 1, 1, 19896, 15, 'Hoa Minh', 0, '1997-04-02', '0987654322', 'hoaminh678@gmail.com', 'Đổ mồ hôi đêm', 0, NULL, '2024-06-22 05:53:23', 67, '2024-06-20 01:14:38'),
(101, NULL, 3, 3, 19896, 6, 'Nguyễn Thùy Linh', 0, '1968-10-20', '0987654323', 'nguyenthuylinh852003@gmail.com', 'Đau bụng', 1, NULL, '2024-06-22 05:52:02', 67, '2024-06-20 01:15:56'),
(102, 1, 1, 6, 19897, 10, 'Vũ Thị Thắm', 1, '2002-05-23', '0987654321', 'tham@gmail.com', 'Đau nửa đầu, buồn nôn', 3, NULL, '2024-06-22 06:41:37', 76, '2024-06-22 06:40:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `specialty_id` int(11) DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL,
  `employee_code` varchar(55) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `avt` varchar(250) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `employees`
--

INSERT INTO `employees` (`employee_id`, `role_id`, `specialty_id`, `position_id`, `employee_code`, `name`, `password`, `avt`, `phone`, `email`, `dob`, `gender`, `address`, `status`, `create_at`, `update_at`, `update_by`) VALUES
(1, 2, 1, 1, 'DOC1', 'Bác sĩ Sơn Tùng', '$2y$12$rtnVP/ML8JMVoSOXRaC7Q.7eSk.dSn7khh0hJb4AxK5iwVioPZ/p6', 'http://localhost/Medicare/assets/img/doctors/doctors-1.jpg', '0900000000', 'panh@gmail.com', '1977-10-29', 1, '12 Trần Hưng Đạo, Hoàn Kiếm, Hà Nội', 1, '2024-06-04 17:21:42', NULL, NULL),
(2, 2, 1, 1, 'DOC2', 'Bác sĩ Thúy Hiền', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'http://localhost/Medicare/assets/img/doctors/doctors-2.jpg', '0900000001', 'hien@gmail.com', '1991-03-09', 1, 'Đa Phúc Đa Tốn Gia Lâm Hà Nội', 1, '2024-06-04 17:21:41', NULL, NULL),
(3, 2, 3, 1, 'DOC3', 'Bác sĩ Minh Khang', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'http://localhost/Medicare/assets/img/doctors/doctors-4.jpg', '0900000002', 'abc@gmail.com', '1989-05-29', 1, '8 Nguyễn Thái Học Quang Trung Hà Đông Hà Nội', 1, '2024-06-04 17:21:37', NULL, NULL),
(4, 2, 4, 1, 'DOC4', 'Bác sĩ Văn Anh', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'http://localhost/Medicare/assets/img/doctors/doctors-3.jpg', '0900000003', 'abc@gmail.com', '1988-10-02', 1, '45 Cầu Giấy Quan Hoa Cầu Giấy Hà Nội', 1, '2024-06-04 17:21:36', NULL, NULL),
(6, 2, 1, 1, 'DOC6', 'Bác sĩ Trọng Hiếu', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1717576871/fj66oi36d7elmwkkkjao.jpg', '0900000004', 'drdk003@gmail.com', '1984-05-22', 0, '23 Nguyễn Lương Bằng Nam Đồng Đống Đa Hà Nội', 1, '2024-06-04 17:21:33', '2024-06-05 15:41:12', NULL),
(7, 2, 1, 1, 'DOC7', 'Bác sĩ Kính Đình', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'http://localhost/Medicare/assets/img/doctors/doctors-4.jpg', '0900000005', 'drdk004@gmail.com', '1974-03-23', 1, '89 Lạc Long Quân Nghĩa Đô Tây Hồ Hà Nội', 1, '2024-06-04 17:21:35', NULL, NULL),
(8, 2, 1, 1, 'DOC8', 'Bác sĩ Thùy Chi', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'http://localhost/Medicare/assets/img/doctors/doctors-4.jpg', '0900000006', 'drdk005@gmail.com', '1989-08-27', 1, '7 Đặng Dung Quán Thánh Ba Đình Hà Nội', 0, '2024-06-04 17:21:42', '2024-06-05 16:34:18', NULL),
(9, 2, 2, 1, 'DOC9', 'Dr Da liễu 1', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'http://localhost/Medicare/assets/img/doctors/doctors-1.jpg', '0900000007', 'drdl001@gmail.com', '1975-04-05', 1, 'Số 34 Đường Kim Mã Phường Kim Mã Quận Ba Đình Hà Nội', 0, '2024-06-04 17:21:41', NULL, NULL),
(10, 2, 2, 1, 'DOC10', 'Dr Da liễu 2', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'http://localhost/Medicare/assets/img/doctors/doctors-2.jpg', '0900000008', 'drdl002@gmail.com', '1977-08-09', 1, 'Số 50 Đường Phạm Văn Đồng Phường Xuân Đỉnh Quận Bắc Từ Liêm Hà Nội', 0, '2024-06-04 17:21:37', NULL, NULL),
(11, 2, 2, 1, 'DOC11', 'Dr Da liễu 3', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'http://localhost/Medicare/assets/img/doctors/doctors-3.jpg', '0900000009', 'drdl003@gmail.com', '1982-01-16', 1, 'Số 19 Đường Nguyễn Khánh Toàn Phường Quan Hoa Quận Cầu Giấy Hà Nội', 0, '2024-06-04 17:21:36', NULL, NULL),
(12, 2, 2, 1, 'DOC12', 'Dr Da liễu 4', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'http://localhost/Medicare/assets/img/doctors/doctors-4.jpg', '0900000010', 'drdl004@gmail.com', '1994-04-03', 1, 'Số 16 Đường Đội Cấn Phường Ngọc Hà Quận Ba Đình Hà Nội', 0, '2024-06-04 17:21:33', NULL, NULL),
(13, 2, 2, 1, 'DOC13', 'Dr Da liễu 5', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'http://localhost/Medicare/assets/img/doctors/doctors-4.jpg', '0900000011', 'drdl005@gmail.com', '1991-09-07', 1, 'Số 5 Đường Hoàng Quốc Việt Phường Nghĩa Tân Quận Cầu Giấy Hà Nội', 0, '2024-06-04 17:21:35', NULL, NULL),
(14, 2, 3, 1, 'DOC14', 'Dr Dinh dưỡng 1', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'http://localhost/Medicare/assets/img/doctors/doctors-1.jpg', '0900000012', 'drdd001@gmail.com', '1983-01-08', 1, 'Thôn Lạc Thổ Bắc Xã Đình Tổ Huyện Thuận Thành Bắc Ninh', 0, '2024-06-04 17:21:42', NULL, NULL),
(15, 2, 3, 1, 'DOC15', 'Dr Dinh dưỡng 2', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'http://localhost/Medicare/assets/img/doctors/doctors-2.jpg', '0900000013', 'drdd002@gmail.com', '1983-10-14', 1, 'Thôn Đông Xã Đại Đồng Huyện Tiên Du Bắc Ninh', 0, '2024-06-04 17:21:41', NULL, NULL),
(16, 2, 3, 1, 'DOC16', 'Dr Dinh dưỡng 3', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'http://localhost/Medicare/assets/img/doctors/doctors-3.jpg', '0900000014', 'drdd003@gmail.com', '1978-01-10', 1, 'Thôn Tam Tảo Xã Phú Lâm Huyện Tiên Du Bắc Ninh', 0, '2024-06-04 17:21:37', NULL, NULL),
(17, 2, 3, 1, 'DOC17', 'Dr Dinh dưỡng 4', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'http://localhost/Medicare/assets/img/doctors/doctors-4.jpg', '0900000015', 'drdd004@gmail.com', '1976-03-16', 1, 'Số 3 Đường Lê Văn Thịnh Phường Suối Hoa Thành phố Bắc Ninh Bắc Ninh', 0, '2024-06-04 17:21:36', NULL, NULL),
(18, 2, 3, 1, 'DOC18', 'Dr Dinh dưỡng 5', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'http://localhost/Medicare/assets/img/doctors/doctors-4.jpg', '0900000016', 'drdd005@gmail.com', '1987-01-04', 1, 'Thôn Lễ Xuyên Xã Đại Bái Huyện Gia Bình Bắc Ninh', 1, '2024-06-04 17:21:33', NULL, NULL),
(19, 2, 4, 1, 'DOC19', 'Dr Di truyền y học 1', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'http://localhost/Medicare/assets/img/doctors/doctors-1.jpg', '0900000017', 'drdtyh001@gmail.com', '1973-07-24', 1, 'Thôn Đông Phù Xã Đông Thọ Huyện Yên Phong Bắc Ninh', 1, '2024-06-04 17:21:35', NULL, NULL),
(20, 2, 4, 1, 'DOC20', 'Dr Di truyền y học 2', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'http://localhost/Medicare/assets/img/doctors/doctors-2.jpg', '0900000018', 'drdtyh002@gmail.com', '1981-01-14', 1, 'Số 6 Đường Trần Hưng Đạo Phường Tiền An Thành phố Bắc Ninh Bắc Ninh', 1, '2024-06-04 17:21:42', NULL, NULL),
(21, 2, 4, 1, 'DOC21', 'Dr Di truyền y học 3', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'http://localhost/Medicare/assets/img/doctors/doctors-3.jpg', '0900000019', 'drdtyh003@gmail.com', '1996-12-04', 1, 'Số 10 Đường Lý Thái Tổ Phường Võ Cường Thành phố Bắc Ninh Bắc Ninh', 1, '2024-06-04 17:21:41', NULL, NULL),
(22, 2, 4, 1, 'DOC22', 'Bác Sĩ Võ Tòng', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'http://localhost/Medicare/assets/img/doctors/doctors-4.jpg', '0900000020', 'drdtyh004@gmail.com', '1990-12-09', 0, 'Số 28 Đường Nguyễn Văn Cừ Phường Võ Cường Thành phố Bắc Ninh Bắc Ninh', 1, '2024-06-04 17:21:37', NULL, NULL),
(23, 2, 4, 1, 'DOC23', 'Bác sĩ Minh Huyền', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'http://localhost/Medicare/assets/img/doctors/doctors-4.jpg', '0900000021', 'huyen005@gmail.com', '1999-05-03', 0, 'Số 32 Đường Ngô Gia Tự Phường Ninh Xá Thành phố Bắc Ninh Bắc Ninh', 1, '2024-06-04 17:21:36', '2024-06-20 00:47:15', 76),
(24, 2, 5, 1, 'DOC24', 'Bác sĩ Mạnh Hải', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'http://localhost/Medicare/assets/img/doctors/doctors-1.jpg', '0900000022', 'drgm001@gmail.com', '1987-11-19', 1, 'Thôn Đông Thái Xã Phú Thị Huyện Gia Lâm Hà Nội', 1, '2024-06-04 17:21:33', '2024-06-20 00:41:31', 76),
(25, 2, 5, 1, 'DOC25', 'Bác sĩ Hoàng Yến', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'http://localhost/Medicare/assets/img/doctors/doctors-2.jpg', '0900000023', 'yen002@gmail.com', '1990-04-15', 0, 'Số 4 Đường Hùng Vương Phường Điện Biên Quận Ba Đình Hà Nội', 1, '2024-06-04 17:21:35', '2024-06-20 00:40:32', 76),
(26, 2, 5, 1, 'DOC26', 'Bác sĩ Hải Đăng', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'http://localhost/Medicare/assets/img/doctors/doctors-3.jpg', '0900000024', 'dang@gmail.com', '1976-11-12', 1, 'Số 1 Đường Lê Thái Tổ Phường Tràng Tiền Quận Hoàn Kiếm Hà Nội', 0, '2024-06-04 17:21:42', '2024-06-20 00:39:30', 76),
(27, 2, 5, 1, 'DOC27', 'Bác sĩ Thùy Trang', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'http://localhost/Medicare/assets/img/doctors/doctors-4.jpg', '0900000025', 'trang@gmail.com', '1990-05-09', 0, 'Số 2 Đường Tràng Tiền Phường Tràng Tiền Quận Hoàn Kiếm Hà Nội', 0, '2024-06-04 17:21:41', '2024-06-20 00:45:04', 76),
(28, 2, 5, 1, 'DOC28', 'Bác sĩ Lee Jong Suk', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718818674/lrwyhaavpwb9yfj3qmgy.jpg', '0900000026', 'suk005@gmail.com', '1995-11-14', 1, 'Số 11 Đường Hàng Bài Phường Hàng Bài Quận Hoàn Kiếm Hà Nội', 0, '2024-06-04 17:21:37', '2024-06-20 00:44:22', 76),
(29, 3, NULL, 2, 'NUR29', 'Employee 1', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'http://localhost/Medicare/assets/img/employees/emp-1.jpg', '0900000027', 'emp001@gmail.com', '1977-01-01', 0, '22 Hàng Khay, Tràng Tiền, Hoàn Kiếm, Hà Nội', 0, '2024-06-04 17:21:36', NULL, NULL),
(30, 3, NULL, 2, 'NUR30', 'Employee 2', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718271865/afjxi5qnj6qvkikycfkx.png', '0900000028', 'emp002@gmail.com', '1995-12-17', 0, 'Số 24 Đường Lý Thái Tổ Phường Lý Thái Tổ Quận Hoàn Kiếm Hà Nội', 1, '2024-06-04 17:21:33', '2024-06-13 16:44:26', NULL),
(31, 3, NULL, 2, 'NUR31', 'Employee 3', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'http://localhost/Medicare/assets/img/employees/emp-3.jpg', '0900000029', 'emp003@gmail.com', '1980-10-27', 0, 'Số 5 Đường Lê Lai Phường Lý Thái Tổ Quận Hoàn Kiếm Hà Nội', 1, '2024-06-04 17:21:35', NULL, NULL),
(32, 3, NULL, 2, 'NUR32', 'Employee 4', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'http://localhost/Medicare/assets/img/employees/emp-4.jpg', '0900000030', 'emp004@gmail.com', '1987-03-06', 0, 'Số 18 Đường Trần Quang Khải Phường Tràng Tiền Quận Hoàn Kiếm Hà Nội', 1, '2024-06-04 17:21:42', NULL, NULL),
(33, 3, NULL, 2, 'NUR33', 'Đặng Thùy Dương', '$2y$12$rtnVP/ML8JMVoSOXRaC7Q.7eSk.dSn7khh0hJb4AxK5iwVioPZ/p6', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718818199/fqzyui5sshjza89zejmn.jpg', '0900000031', 'duong005@gmail.com', '1979-02-20', 0, '20 Hàng Đậu, Đồng Xuân, Hoàn Kiếm, Hà Nội', 1, '2024-06-04 17:21:41', '2024-06-20 00:30:01', 76),
(34, 3, NULL, 2, 'NUR34', 'Đoàn Ngọc Dịu', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718817957/nsfqsfr8ancg0fqchhsj.jpg', '0900000032', 'diu@gmail.com', '1975-07-11', 0, 'Số 15 Đường Nguyễn Hữu Huân Phường Lý Thái Tổ Quận Hoàn Kiếm Hà Nội', 1, '2024-06-04 17:21:37', '2024-06-20 00:25:59', 76),
(35, 3, NULL, 2, 'NUR35', 'Nguyễn Hoài Trang', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718817830/fys5agxxxji1gwunxoxy.jpg', '0900000033', 'trang007@gmail.com', '1979-05-29', 0, 'Số 25 Đường Nguyễn Du Phường Hàng Bài Quận Hoàn Kiếm Hà Nội', 0, '2024-06-04 17:21:36', '2024-06-20 00:23:52', 76),
(36, 3, NULL, 2, 'NUR36', 'Phạm Ánh Ngọc', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718817783/rgfj31i5asu96imkqyhk.jpg', '0900000034', 'ngoc008@gmail.com', '1985-10-31', 0, 'Số 30 Đường Ngô Quyền Phường Tràng Tiền Quận Hoàn Kiếm Hà Nội', 0, '2024-06-04 17:21:33', '2024-06-20 00:23:05', 76),
(37, 3, NULL, 2, 'NUR37', 'Tô Vân Anh', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718817707/rvbj01ootbqt9tmkcwsb.jpg', '0900000035', 'anh009@gmail.com', '1997-07-03', 0, 'Số 8 Đường Hàng Mành Phường Hàng Gai Quận Hoàn Kiếm Hà Nội', 1, '2024-06-04 17:21:35', '2024-06-20 00:21:49', 76),
(38, 3, NULL, 2, 'NUR38', 'Nguyễn Minh Thu', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718817666/quwmbwjgzv4p7it3oioi.jpg', '0900000036', 'thu010@gmail.com', '1989-08-05', 0, 'Số 16 Đường Hàng Da Phường Hàng Bông Quận Hoàn Kiếm Hà Nội', 1, '2024-06-04 17:21:33', '2024-06-20 00:21:08', 76),
(55, 3, NULL, 2, 'NUR55', 'Đinh Trang Nhung', '$2y$12$9a/VGJSiqrydICTXsujMheKkSgPzG/RpvgKX4fhqvh7eE.qQfSYNi', 'http://localhost/Medicare/assets/img/doctors/doctor_default.png', '0900000037', 'b@gmail.com', '1979-09-08', 0, '19 Hàng Thiếc, Hàng Gai, Hoàn Kiếm, Hà Nội', 1, '2024-06-10 04:06:31', '2024-06-20 00:20:28', 76),
(63, 2, 5, 1, 'DOC63', 'Bác sĩ Mạnh Trường', '$2y$12$hDCIpywaJGCT.RBg/5k5eOkk8P82gK2ZpDSrHyW8Jws86exFeeWKm', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1717990126/d8k9brig50tcfwykjyoo.png', '0900000038', 'truong@gmail.com', '1989-07-05', 1, 'Số 21 Đường Hàng Đồng Phường Hàng Bạc Quận Hoàn Kiếm Hà Nội', 1, '2024-06-10 10:28:11', '2024-06-20 00:33:41', 76),
(64, 3, 24, 2, 'NUR64', 'Nguyễn Mạnh Tú', '$2y$12$LV4KepR1TDjQqOB/RHg/1upVybP59AL.obdQNTwWekHhHixGoKY3e', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718817584/q1g5spouqvgotfaaofzo.jpg', '0900000039', 'aa@gmail.com', '1986-04-15', 1, 'Số 27 Đường Hàng Bông Phường Hàng Bông Quận Hoàn Kiếm Hà Nội', 1, '2024-06-10 14:04:31', '2024-06-20 00:20:02', 76),
(65, 3, NULL, 2, 'NUR65', 'Nguyễn Hoàng Anh', '$2y$12$kKnB9ngk7CQfzbyRJaZuXO80BjkU0xDdYejHyPeZ4bnGfgOcPJ27m', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718004891/crx8krfkmspderrxrvil.jpg', '0900000040', 'bbbb@gmail.com', '1981-06-01', 1, 'Số 33 Đường Hàng Gai Phường Hàng Gai Quận Hoàn Kiếm Hà Nội', 1, '2024-06-10 09:34:52', '2024-06-20 00:19:07', 76),
(66, 3, NULL, 2, 'NUR66', 'Đình Khải Phạm', '$2y$12$B4ClEtI1tyo..MVCMTOzFeCDV3cQBC9ZHz2cmiWQXeOKIlULhziOK', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718817513/qhwuakpie72ub3ksarq5.jpg', '0900000041', 'cccc@gmail.com', '1991-09-03', 1, 'Số 35 Đường Hàng Hòm Phường Hàng Gai Quận Hoàn Kiếm Hà Nội', 1, '2024-06-10 09:38:42', '2024-06-20 00:18:35', 76),
(67, 3, NULL, 2, 'REC67', 'Phạm Văn Cảnh', '$2a$12$S/NPYls/TQCkFJYsnDa1pOTjDlCKkwdUMci7m.q4zYh8vkUfLrLeG', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718817363/plc9dfu6dpixhmizl9p7.jpg', '0900000042', 'canh@gmail.com', '1992-01-22', 1, '40 Hàng Trống, Hàng Trống, Hoàn Kiếm, Hà Nội', 1, '2024-06-13 05:21:18', '2024-06-20 00:16:06', 76),
(68, 3, NULL, 3, 'REC68', 'Vũ Văn Đình', '$2y$12$i5aHGWF06z2lgAWebd3V4uWRpmyxCl9cX3kfArWzPkFQkQNW9YBf6', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718278970/imvdzp2erv0ackc0hahy.jpg', '0900000043', 'cupdate@gmail.com', '1999-05-25', 1, 'Số 42 Đường Hàng Gai Phường Hàng Gai Quận Hoàn Kiếm Hà Nội', 1, '2024-06-13 09:29:58', '2024-06-20 00:15:21', 76),
(69, 3, 21, 1, 'DOC69', 'Nguyễn Văn Anh', '$2y$12$/B5227uoA2qnEQoKAcwbwOdH8kqCTu3YYqQadqVTavElDay0OHKQy', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718817288/qmc259eymlli0yqsfrd9.jpg', '0900000044', 'bac@gmail.com', '1982-04-22', 1, 'Số 48 Đường Hàng Bông Phường Hàng Bông Quận Hoàn Kiếm Hà Nội', 1, '2024-06-13 14:54:00', '2024-06-20 00:14:50', 76),
(70, 2, 5, 1, 'DOC70', 'Bác sĩ Thế Vinh', '$2y$12$jsR/yYg0B0D4Cd248tjQcegTp1ECX2Qk1aCp2vChsD4yKmgAk1Os6', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718818380/v5yske7g3yacnzdvlvki.jpg', '0900000045', 'vinh@gmail.com', '1987-07-10', 1, 'Số 50 Đường Hàng Trống Phường Hàng Trống Quận Hoàn Kiếm Hà Nội', 1, '2024-06-13 14:55:21', '2024-06-20 00:33:02', 76),
(71, 3, NULL, 2, 'NUR71', 'Nguyễn Đức Nam', '$2y$12$m2RktSVvvKFfyWkV2zsL4ehJZSnWsQw0.Mz39d/d1LPvqLJyaYWQy', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718817233/av3mwfoopzkg8wmrnojj.jpg', '0900000046', 'moi@gmail.com', '1988-06-11', 1, 'Số 55 Đường Hàng Gai Phường Hàng Gai Quận Hoàn Kiếm Hà Nội', 1, '2024-06-15 09:51:13', '2024-06-20 00:14:13', 76),
(72, 3, NULL, 3, 'REC72', 'Phạm Hồng Nhung', '$2y$12$or1H0m7UnuOfA8UhR.He8OpRUNb4WCdojOcSOMeSXECbfGieqJtui', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718817084/kptipqz1rnyzujcvsqyq.jpg', '0900000047', 'moi2@gmail.com', '1979-04-15', 0, 'Số 60 Đường Hàng Bông Phường Hàng Bông Quận Hoàn Kiếm Hà Nội', 0, '2024-06-15 09:54:59', '2024-06-20 00:11:26', 76),
(73, 2, 1, 1, 'DOC73', 'Bác sĩ Văn Thọ', '$2y$12$mFn4vO.nxLa1Jfvz0iPCx.jNBNJiicIctHdkN3nyLu1g.P40ppU06', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718818333/w6efamshuswutwjeygyu.jpg', '0900000048', 'tanh@gmail.com', '1983-02-25', 1, 'Số 65 Đường Hàng Trống Phường Hàng Trống Quận Hoàn Kiếm Hà Nội', 1, '2024-06-15 15:14:53', '2024-06-20 00:32:15', 76),
(74, 2, 1, 1, 'DOC74', 'Bác sĩ Hồng Anh', '$2y$12$F/PQzGlI3bEpVKoHI9I2yeQlKSOe5PLPIIDkLJ393EQRXCrKkNIfO', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718818297/kjt1bhtkqzncyswaiyqj.jpg', '0900000049', 'anh@gmail.com', '1983-07-04', 1, 'Số 70 Đường Hàng Gai Phường Hàng Gai Quận Hoàn Kiếm Hà Nội', 1, '2024-06-15 15:20:04', '2024-06-20 00:31:39', 76),
(75, 2, 26, 1, 'DOC75', 'Bác sĩ Minh Quân', '$2y$12$1.bWd0.aOBg4q.VWZJ3VZOHONBweORlQiqF5ONxTOgU1CrJ.91x22', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718818258/tzf6byvtvyeopjz0vyxp.jpg', '0900000050', 'quan@gmail.com', '1980-07-16', 1, 'Số 75 Đường Hàng Bông Phường Hàng Bông Quận Hoàn Kiếm Hà Nội', 1, '2024-06-15 15:20:58', '2024-06-20 00:31:00', 76),
(76, 1, 1, 1, 'ADMIN1', 'Admin 1', '$2y$12$H0JY/xRjgfhc9P1P.dXKqen4VFcm7D96RTBR1QdnGp.4ZxTJEQDGK', 'http://localhost/Medicare/assets/img/doctors/doctor_default.png', '0900000051', 'admin1@gmail.com', '1982-05-01', 1, '80 Hàng Trống, Hàng Trống, Hoàn Kiếm, Hà Nội', 1, '2024-06-16 03:10:06', NULL, NULL),
(77, 2, 7, 1, 'DOC77', 'Thanh Hoa', '$2y$12$DyUJoU1xvEIG2hsexmz0ROqI.iwscJYkM65UBqHLYAEE2hwpbEePe', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718819378/xqct1nowkdqgjmme6iqf.jpg', '0900000052', 'huyen005@gmail.com', '1982-08-08', 0, 'Số 85 Đường Hàng Gai Phường Hàng Gai Quận Hoàn Kiếm Hà Nội', 1, '2024-06-20 00:49:39', NULL, 76),
(78, 2, 7, 1, 'DOC78', 'Thanh Hoa', '$2y$12$.skCw6MKCYea0qkSNiR58uuNCuiveMR3VfJGwY8TS1mib8Tz3q3My', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718819380/pcnwa5jddy6odf6shnlh.jpg', '0900000053', 'huyen005@gmail.com', '1981-09-02', 0, 'Số 90 Đường Hàng Bông Phường Hàng Bông Quận Hoàn Kiếm Hà Nội', 1, '2024-06-20 00:49:42', NULL, 76),
(79, 2, 24, 1, 'DOC79', 'Bác sĩ Minh Hà', '$2y$12$oJtu1DeqmjYkQ8QhU3xT/u7c9JkdfhSd5a0yRZW8phb9VjheXVXJO', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718819479/uilcwocdzmso1uk7503p.jpg', '0900000054', 'trang@gmail.com', '1981-07-08', 0, 'Số 95 Đường Hàng Trống Phường Hàng Trống Quận Hoàn Kiếm Hà Nội', 1, '2024-06-20 00:51:21', '2024-06-20 16:23:52', 76),
(80, 2, 24, 1, 'DOC80', 'Bác sĩ Minh Trang', '$2y$12$VKiJFJBPnP1TR48ekh.siORDF5qoyY2xZSx1KEuXuh0160YY7yUFO', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718819482/tf1z9kda6oab8gaiawyn.jpg', '0900000055', 'trang@gmail.com', '1987-08-19', 0, 'Số 100 Đường Hàng Gai Phường Hàng Gai Quận Hoàn Kiếm Hà Nội', 1, '2024-06-20 00:51:24', NULL, 76),
(81, 2, 21, 1, 'DOC81', 'Bác sĩ Mạnh Dũng', '$2y$12$qnV8jxbY..zMjsDCyLqZ4ezE1/gX4fjd3NGFgzlPUTa9lBWkG4k1m', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718819569/q2ebapdsifaj82zzjye9.jpg', '0900000056', 'dung@gmail.com', '1993-02-08', 1, 'Số 105 Đường Hàng Bông Phường Hàng Bông Quận Hoàn Kiếm Hà Nội', 1, '2024-06-20 00:52:51', '2024-06-20 16:06:55', 76),
(82, 2, 20, 1, 'DOC82', 'Bác sĩ Nhật Minh', '$2y$12$hw0VtCPDYjYOHRR47v8OAeXSF/LJFt9akMotLEZ.F6DC5njUPsfBG', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718874349/ocsg5gnjgevprg9snwnh.jpg', '0900000057', 'minh005@gmail.com', '1988-03-12', 1, 'Số 110 Đường Hàng Trống Phường Hàng Trống Quận Hoàn Kiếm Hà Nội', 1, '2024-06-20 00:52:53', '2024-06-20 16:06:16', 76),
(83, 2, 15, 1, 'DOC83', 'Bác sĩ Bảo Khánh', '$2y$12$XhQnX.o6OUjLHTg3FJ5Ir.bEZg1LzmUeV33BOAi1TEiIMxiPITASG', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718874315/vfxrucg51ukuphhzyfzb.jpg', '0900000058', 'huyen005@gmail.com', '1980-04-06', 1, 'Số 115 Đường Hàng Gai Phường Hàng Gai Quận Hoàn Kiếm Hà Nội', 1, '2024-06-20 00:52:56', '2024-06-21 12:48:07', 76),
(84, 2, 12, 1, 'DOC84', 'Bác sĩ Minh Huy', '$2y$12$S5ONMbwJz4wkNkRqwelbmOx5R1QkMYiKwUDKh4epeXyQKscIArFVa', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718819576/pxbfzxkcrpd299ez56jc.jpg', '0900000059', 'huyen005@gmail.com', '1994-04-14', 1, 'Số 120 Đường Hàng Bông Phường Hàng Bông Quận Hoàn Kiếm Hà Nội', 1, '2024-06-20 00:52:58', '2024-06-20 16:04:34', 76),
(85, 2, 7, 1, 'DOC85', 'Bác sĩ Khánh An', '$2y$12$gpxTNjTdcHYrONpDepL0LeUuCgXlx/LyXKPRa0Nwt4Z0rAZSsoBBy', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1719012879/tcqf858rvhbghdwpho94.jpg', '0900000060', 'huyen005@gmail.com', '1982-09-30', 1, '125 Hàng Trống Hàng Trống Hoàn Kiếm Hà Nội', 1, '2024-06-20 00:53:00', '2024-06-22 06:34:39', 76),
(86, 3, NULL, 2, 'NUR86', 'Nguyễn Hải Anh', '$2y$12$I01HKDTqlIcPz1C9PdsETeUPWXM6mrCIjKFGcBQMtK6QWi00/Ti3.', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718874897/gzcnkfw2nc2cjtpomrs5.jpg', '0900000061', 'anh@gmail.com', '1978-05-31', 0, 'Số 130 Đường Hàng Gai Phường Hàng Gai Quận Hoàn Kiếm Hà Nội', 1, '2024-06-20 11:14:58', NULL, 76),
(87, 3, NULL, 3, 'REC87', 'Thu Nguyễn', '$2y$12$KWuXKslzXyKWviCebjOlD.ff0UVUTMZxWUUJok36QiYl6eBHdeeg2', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718874962/xqussbptwcwmsmr9wcvp.jpg', '0900000062', 'Thu1912@gmail.com', '1984-12-02', 0, 'Số 135 Đường Hàng Bông Phường Hàng Bông Quận Hoàn Kiếm Hà Nội', 1, '2024-06-20 11:16:03', NULL, 76),
(88, 3, NULL, 3, 'REC88', 'Trọng Khang', '$2y$12$Ac6D.BEMMq9soQT9wz7rmO/9JdJlwcpjxyQDhZburZIPyrn/kFwXe', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718875023/snix1lzydggapi0cetps.jpg', '0900000063', 'khang@gmail.com', '1984-01-24', 1, 'Số 140 Đường Hàng Trống Phường Hàng Trống Quận Hoàn Kiếm Hà Nội', 1, '2024-06-20 11:17:03', NULL, 76),
(89, 3, NULL, 2, 'NUR89', 'Nguyễn Minh Hải', '$2y$12$cpCCiWfY/Ad43ES8Cf1UJeGkLvDC7XDhY7f9aM0XlIA2fdz2jfsJe', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718875095/owfngmawkcouoojqtwmx.jpg', '0900000064', 'hai123@gmail.com', '1996-06-02', 0, 'Số 145 Đường Hàng Gai Phường Hàng Gai Quận Hoàn Kiếm Hà Nội', 1, '2024-06-20 11:18:15', NULL, 76),
(90, 3, NULL, 2, 'NUR90', 'Phạm Anh Thư', '$2y$12$QNKclIvfSfrj1tZZpwO8su1GsctuPy.S6VHFk8DFOPCfMIc3Jfec2', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718875153/tj4gbj2a6i7akrgkqoho.jpg', '0900000065', 'thu123@gmail.com', '1976-04-30', 0, 'Số 150 Đường Hàng Bông Phường Hàng Bông Quận Hoàn Kiếm Hà Nội', 1, '2024-06-20 11:19:13', NULL, 76),
(91, 3, NULL, 3, 'REC91', 'Giáp Gia Hân', '$2y$12$AIe2v5hseIyMYBcHJEVmNuZ/Rwuh0GPT.a8nu6lB3gJTRU.LMuhAG', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718875214/k4jd2aokuulqe5fvnone.jpg', '0900000066', 'haan123@gmail.com', '1989-06-01', 0, 'Số 155 Đường Hàng Trống Phường Hàng Trống Quận Hoàn Kiếm Hà Nội', 1, '2024-06-20 11:20:15', NULL, 76),
(92, 3, NULL, 3, 'REC92', 'Nguyễn Quý Ngân', '$2y$12$8S7u2d5TKYyJm5PTMbKqhOt/w1FcTCxgYAzrVewou9qKXCa5zkdKC', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718875268/rfoiiu4wnzbwyxqecrtq.jpg', '0900000067', 'ngan123@gmail.com', '1987-11-26', 0, 'Số 160 Đường Hàng Gai Phường Hàng Gai Quận Hoàn Kiếm Hà Nội', 1, '2024-06-20 11:21:09', NULL, 76),
(93, 3, NULL, 2, 'NUR93', 'Thu Huyền', '$2y$12$Q6A98Ev2w.nBZpTyAw7qcuEjxUY7HerjJGo5Qcc46LVEjIT7HUMb.', 'https://res.cloudinary.com/dnp6p86dp/image/upload/v1718875331/c9bwuheksy4levx0ukff.jpg', '0900000068', 'huyen005@gmail.com', '1990-07-16', 0, NULL, 1, '2024-06-20 11:22:11', NULL, 76);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `patients`
--

INSERT INTO `patients` (`patient_id`, `name`, `password`, `dob`, `gender`, `address`, `phone`, `email`, `status`, `create_at`, `update_by`, `update_at`) VALUES
(1, 'Vũ Thị Thắm', '$2y$12$aLtxz8E/DO/Be3cuOGbG9e7DelYAoJD/gjdBXve6b6lcatxh7NInq', '2002-05-23', 1, 'Thanh Tri, Thanh Liet, Ha Noi 1', '0987654321', 'tham@gmail.com', 1, '2024-02-22 06:21:01', 76, '2024-06-16 19:33:14'),
(2, 'Thúy Hiền', '$2a$12$3Ry4td9KXgnnbd9pzsuPmeJytyyV3I0kX1Vq.y/hpwV7IoQ8QuZ0u\n', '2002-10-25', 0, 'Lac Long Quan, Tay Ho, Ha Noi', '0964434888', 'hien@gmail.com', 1, '2024-05-22 06:21:06', NULL, NULL),
(3, 'Ngọc Lan', '$2a$12$y2zig.K/MX4pFnXGkMsTTe7dzbu1fDbYCQYsUb.w38WB/SQ2SxCEO\n', '2002-05-27', 1, 'Ho Tung Mau, Cau Giay, Ha Noi', '0915033333', 'abc@gmail.com', 1, '2024-05-22 06:21:29', NULL, NULL),
(4, 'Thu Hường', '$2a$12$sQlXdw.1Icv2hipevwl/GeVZXQscmLfvPmRryYsJckvzNx.xoKo1C', '2002-09-23', 1, 'Doi Can, Ba Dinh, Ha Noi', '0936501777', 'abc@gmail.com', 1, '2024-03-22 06:21:32', NULL, NULL),
(5, 'Hải Yến', '$2a$12$SyDIjHYt2zMR2XH1rCJN7.WIUItgQgtt.Oo3a6z9LhrxW3mORhMAy', '2002-05-18', 0, 'Kim Ma Thuong, Ba Dinh, Ha Noi', '0938729999', 'abc@gmail.com', 1, '2024-02-22 06:21:01', NULL, NULL),
(31, 'Nguyễn Trang Hà', '$2a$12$SyDIjHYt2zMR2XH1rCJN7.WIUItgQgtt.Oo3a6z9LhrxW3mORhMAy', '1985-03-15', 1, 'Phố Huế, Hai Bà Trưng, Hà Nội', '0912345678', 'nguyenvane@gmail.com', 1, '2024-05-22 06:21:06', NULL, NULL),
(32, 'Hà Thanh', '$2a$12$SyDIjHYt2zMR2XH1rCJN7.WIUItgQgtt.Oo3a6z9LhrxW3mORhMAy', '1990-07-22', 0, 'Cầu Giấy, Hà Nội', '0912345679', 'tranthif@gmail.com', 1, '2024-05-22 06:21:29', NULL, NULL),
(33, 'Lê Hoàng Vũ', '$2a$12$SyDIjHYt2zMR2XH1rCJN7.WIUItgQgtt.Oo3a6z9LhrxW3mORhMAy', '2000-11-11', 1, 'Hoàn Kiếm, Hà Nội', '0912345680', 'lehoangg@gmail.com', 1, '2024-03-22 06:21:32', NULL, NULL),
(34, 'Ánh Nguyệt', '$2a$12$SyDIjHYt2zMR2XH1rCJN7.WIUItgQgtt.Oo3a6z9LhrxW3mORhMAy', '1978-05-30', 1, 'Đống Đa, Hà Nội', '0912345681', 'phaminhh@gmail.com', 1, '2024-02-22 06:21:01', NULL, NULL),
(35, 'Lan Anh', '$2a$12$SyDIjHYt2zMR2XH1rCJN7.WIUItgQgtt.Oo3a6z9LhrxW3mORhMAy', '1995-02-14', 0, 'Tây Hồ, Hà Nội', '0912345682', 'nguyenthii@gmail.com', 1, '2024-05-22 06:21:06', NULL, NULL),
(36, 'Bùi Mạnh Quân', '$2a$12$SyDIjHYt2zMR2XH1rCJN7.WIUItgQgtt.Oo3a6z9LhrxW3mORhMAy', '1982-09-17', 1, 'Hà Đông, Hà Nội', '0912345683', 'buivanj@gmail.com', 1, '2024-05-22 06:21:29', 1, '2024-06-14 06:54:24'),
(37, 'Trang Vũ', '$2a$12$SyDIjHYt2zMR2XH1rCJN7.WIUItgQgtt.Oo3a6z9LhrxW3mORhMAy', '1992-06-06', 0, 'Long Biên, Hà Nội', '0912345684', 'dothik@gmail.com', 1, '2024-03-22 06:21:32', NULL, NULL),
(38, 'Hải Lan', '$2a$12$SyDIjHYt2zMR2XH1rCJN7.WIUItgQgtt.Oo3a6z9LhrxW3mORhMAy', '1989-12-21', 1, 'Ba Đình, Hà Nội', '0912345685', 'hoangvanl@gmail.com', 1, '2024-02-22 06:21:01', NULL, NULL),
(39, 'Như Ý', '$2a$12$SyDIjHYt2zMR2XH1rCJN7.WIUItgQgtt.Oo3a6z9LhrxW3mORhMAy', '1987-08-08', 0, 'Hai Bà Trưng, Hà Nội', '0912345686', 'trinhthim@gmail.com', 1, '2024-05-22 06:21:06', NULL, NULL),
(40, 'Túc Quốc Công', '$2a$12$SyDIjHYt2zMR2XH1rCJN7.WIUItgQgtt.Oo3a6z9LhrxW3mORhMAy', '1993-03-01', 1, 'Thanh Xuân, Hà Nội', '0912345687', 'vominhn@gmail.com', 1, '2024-05-22 06:21:29', NULL, NULL),
(52, 'Nguyễn Thùy Linh', '$2y$12$8zDpmhzzhGLXUrkU62xe7eCFW8qbnyTOWBWK78c7kB6Ez5xAus55a', '2003-05-08', 0, '73 Láng Hạ Đống Đa Hà Nội', '0813966292', 'nguyenthuylinh852003@gmail.com', 1, '2024-03-22 06:21:32', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `positions`
--

CREATE TABLE `positions` (
  `position_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `positions`
--

INSERT INTO `positions` (`position_id`, `name`) VALUES
(1, 'Bác sĩ'),
(2, 'Điều dưỡng'),
(3, 'Lễ tân');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'doctor'),
(3, 'employee');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `specialties`
--

CREATE TABLE `specialties` (
  `specialty_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `specialties`
--

INSERT INTO `specialties` (`specialty_id`, `name`, `description`, `update_at`, `update_by`, `create_at`, `status`) VALUES
(1, 'Đa khoa', 'Khám & điều trị các bệnh lý cơ bản, chưa rõ nguyên nhân, chưa có định hướng chuyên khoa cụ thể', '2024-06-18 16:16:08', 76, '2024-05-19 12:48:17', 1),
(2, 'Da liễu', 'Khám & điều trị các bệnh về da và những phần phụ của da', '2024-06-03 14:45:10', NULL, '2024-05-13 12:48:17', 0),
(3, 'Dinh dưỡng', 'Tư vấn chế độ dinh dưỡng cũng như chế độ ăn uống phù hợp cho từng thể trạng và bệnh lý khác nhau ở mọi lứa tuổi', '2024-06-03 09:22:35', NULL, '2024-05-14 12:48:17', 1),
(4, 'Di truyền y học', 'Tư vấn di truyền cho các trường hợp mắc bệnh lý di truyền & mắc dị tật bẩm sinh...', '2024-06-03 16:55:44', NULL, '2024-05-24 12:48:17', 1),
(5, 'Gây mê - Điều trị đau', 'Chăm sóc giảm nhẹ cho người bệnh', '2024-06-03 07:05:29', NULL, '2024-05-11 12:48:17', 1),
(6, 'Hen - Dị ứng miễn dịch', 'Khám & điều trị các bệnh dị ứng', '2024-06-03 19:47:18', NULL, '2024-05-31 12:48:17', 1),
(7, 'Hô hấp', 'Khám, điều trị bệnh lý đường hô hấp như hen suyễn, viêm phế quản, viêm phổi, bệnh phổi tắc nghẽn mạn tính...', '2024-06-03 18:15:52', NULL, '2024-05-15 12:48:17', 1),
(8, 'Hỗ trợ sinh sản', 'Khám và điều trị các bệnh lý vô sinh hiếm muộn', '2024-06-03 23:40:11', NULL, '2024-05-18 12:48:17', 1),
(9, 'Huyết học', 'Khám & điều trị các bệnh lý về máu', '2024-06-03 05:30:46', NULL, '2024-05-23 12:48:17', 0),
(12, 'Nam khoa', 'Khám và điều trị các vấn đề liên quan tới bộ phận sinh sản nam', '2024-06-03 19:35:24', NULL, '2024-06-01 12:48:17', 1),
(13, 'Ngoại chấn thương chỉnh hình', 'Khám & điều trị các chấn thương và tình trạng bệnh liên quan đến hệ thống cơ xương khớp', '2024-06-03 02:05:11', NULL, '2024-06-02 12:48:17', 1),
(14, 'Ngoại nhi', 'Phẫu thuật nhi chung: dị tật bẩm sinh nhi; lồng ruột', '2024-06-03 17:15:54', NULL, '2024-05-22 12:48:17', 0),
(15, 'Ngoại tim mạch', 'Khám & điều trị các bệnh: tim bẩm sinh, suy tim, phình động mạch, tổn thương, chấn thương các cơ quan trong lồng ngực...', '2024-06-03 06:40:17', NULL, '2024-05-29 12:48:17', 1),
(16, 'Nội cơ xương khớp', 'Khám & điều trị các bệnh lý về cơ, xương, khớp bằng phương pháp nội khoa như: thuốc men, tiêm chích, vật lý trị liệu...', '2024-06-03 22:50:13', NULL, '2024-05-30 12:48:17', 1),
(17, 'Nội tiết', 'Khám và điều trị các bệnh như tiểu đường, rối loạn tuyến giáp, rối loạn cholesterol, tuyến yên, tuyến thượng thận...', '2024-06-03 04:25:47', NULL, '2024-05-10 12:48:17', 1),
(19, 'Phục hồi chức năng', 'Hỗ trợ phục hồi các chức năng, năng lực vận động và nhận thức tâm lý vốn có đã mất đi, suy giảm hoặc tiềm ẩn của cơ thể', '2024-06-03 15:50:08', NULL, '2024-05-20 12:48:17', 1),
(20, 'Răng - Hàm - Mặt', 'Khám & điều trị bệnh lý về cấu trúc răng (xương, tuỷ răng..), hàm (vòm miệng, quai hàm,...) & mặt (xương trán, gò má...)', '2024-06-03 12:45:36', NULL, '2024-05-26 12:48:17', 1),
(21, 'Tai - Mũi - Họng', 'Thông thường, các khối u vùng đầu mặt cổ, các dị tật bẩm sinh vùng tai mũi họng,..', '2024-06-19 23:42:51', 76, '2024-05-17 12:48:17', 1),
(22, 'Tâm lý', 'Khám và điều trị các bệnh lý về tâm thần như rối loạn lo âu, trầm cảm...', '2024-06-14 03:48:54', NULL, '2024-06-03 12:48:17', 1),
(23, 'Thẩm mỹ ', 'Khám, tư vấn & can thiệp các vấn đề liên quan đến việc phục hồi, tái thiết hoặc thay đổi cơ thể, diện mạo bên ngoài', '2024-06-19 23:41:55', 76, '2024-05-27 12:48:17', 1),
(24, 'Tiêu hóa', 'Khám tiêu hóa là quá trình kiểm tra hình thái và đánh giá chức năng của các cơ quan trong hệ tiêu hóa để phát hiện những rối loạn và bất thường', '2024-06-03 14:05:17', NULL, '2024-05-09 12:48:17', 1),
(26, 'Truyền nhiễm', 'Khám & điều trị các bệnh do vi khuẩn, ký sinh trùng, nhiễm trùng chưa xác định nguyên nhân gây bệnh', '2024-06-03 20:10:48', NULL, '2024-05-16 12:48:17', 1),
(37, 'Chuyên khoa mới', 'Mô tả ngắn updated', '2024-06-21 09:22:01', 76, '2024-06-21 04:20:01', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `time_slots`
--

CREATE TABLE `time_slots` (
  `time_id` int(11) NOT NULL,
  `slot_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `time_slots`
--

INSERT INTO `time_slots` (`time_id`, `slot_time`) VALUES
(1, '08:00:00'),
(2, '08:30:00'),
(3, '09:00:00'),
(4, '09:30:00'),
(5, '10:00:00'),
(6, '10:30:00'),
(7, '11:00:00'),
(8, '13:00:00'),
(9, '13:30:00'),
(10, '14:00:00'),
(11, '14:30:00'),
(12, '15:00:00'),
(13, '15:30:00'),
(14, '16:00:00'),
(15, '16:30:00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `specialty_id` (`specialty_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `date_id` (`date_slot`),
  ADD KEY `time_id` (`time_id`);

--
-- Chỉ mục cho bảng `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `specialty_id` (`specialty_id`),
  ADD KEY `position_id` (`position_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Chỉ mục cho bảng `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Chỉ mục cho bảng `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`position_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Chỉ mục cho bảng `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`specialty_id`);

--
-- Chỉ mục cho bảng `time_slots`
--
ALTER TABLE `time_slots`
  ADD PRIMARY KEY (`time_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT cho bảng `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT cho bảng `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `positions`
--
ALTER TABLE `positions`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `specialties`
--
ALTER TABLE `specialties`
  MODIFY `specialty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `time_slots`
--
ALTER TABLE `time_slots`
  MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`specialty_id`) REFERENCES `specialties` (`specialty_id`),
  ADD CONSTRAINT `appointments_ibfk_3` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`),
  ADD CONSTRAINT `appointments_ibfk_5` FOREIGN KEY (`time_id`) REFERENCES `time_slots` (`time_id`);

--
-- Các ràng buộc cho bảng `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`specialty_id`) REFERENCES `specialties` (`specialty_id`),
  ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`position_id`) REFERENCES `positions` (`position_id`),
  ADD CONSTRAINT `employees_ibfk_3` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
