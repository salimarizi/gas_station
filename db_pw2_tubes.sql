/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : 127.0.0.1:3306
 Source Schema         : db_pw2_tubes

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 18/01/2021 08:10:32
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (8, '2013_01_09_140514_create_outlets_table', 1);
INSERT INTO `migrations` VALUES (9, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (10, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (11, '2021_01_09_141132_create_prices_table', 1);
INSERT INTO `migrations` VALUES (12, '2021_01_09_141309_create_points_table', 1);
INSERT INTO `migrations` VALUES (13, '2021_01_09_141504_create_vehicles_table', 1);
INSERT INTO `migrations` VALUES (14, '2021_01_09_141627_create_transactions_table', 1);

-- ----------------------------
-- Table structure for outlets
-- ----------------------------
DROP TABLE IF EXISTS `outlets`;
CREATE TABLE `outlets`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of outlets
-- ----------------------------
INSERT INTO `outlets` VALUES (1, 'Pasteur', 'Bandung', '2021-01-09 21:30:20', '2021-01-09 21:30:23');
INSERT INTO `outlets` VALUES (3, 'Outlet Padalarang', 'Bandung Barat', '2021-01-17 15:15:48', '2021-01-17 15:15:48');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for points
-- ----------------------------
DROP TABLE IF EXISTS `points`;
CREATE TABLE `points`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime(0) NOT NULL,
  `point` double NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `points_user_id_index`(`user_id`) USING BTREE,
  CONSTRAINT `points_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of points
-- ----------------------------
INSERT INTO `points` VALUES (1, 5, '2020-01-01 07:27:24', 40, '2021-01-17 07:26:25', '2021-01-17 07:26:25');
INSERT INTO `points` VALUES (2, 5, '2021-01-17 07:27:24', 40, '2021-01-17 07:27:24', '2021-01-17 07:27:24');
INSERT INTO `points` VALUES (4, 5, '2021-01-17 08:31:21', 50, '2021-01-17 08:31:21', '2021-01-17 08:31:21');
INSERT INTO `points` VALUES (5, 5, '2021-01-17 08:32:04', 25, '2021-01-17 08:32:04', '2021-01-17 08:32:04');
INSERT INTO `points` VALUES (6, 5, '2021-01-17 13:12:56', 8, '2021-01-17 13:12:56', '2021-01-17 13:12:56');
INSERT INTO `points` VALUES (8, 5, '2021-01-17 13:19:15', -150, '2021-01-17 13:19:15', '2021-01-17 13:19:15');
INSERT INTO `points` VALUES (9, 5, '2021-01-17 13:20:10', 10, '2021-01-17 13:20:10', '2021-01-17 13:20:10');
INSERT INTO `points` VALUES (10, 5, '2021-01-01 07:27:24', 40, '2021-01-17 07:26:25', '2021-01-17 07:26:25');
INSERT INTO `points` VALUES (11, 5, '2021-01-17 15:09:21', 10, '2021-01-17 15:09:21', '2021-01-17 15:09:21');
INSERT INTO `points` VALUES (12, 5, '2021-01-17 15:18:45', 6, '2021-01-17 15:18:45', '2021-01-17 15:18:45');
INSERT INTO `points` VALUES (13, 5, '2021-01-17 15:48:21', 10, '2021-01-17 15:48:21', '2021-01-17 15:48:21');

-- ----------------------------
-- Table structure for prices
-- ----------------------------
DROP TABLE IF EXISTS `prices`;
CREATE TABLE `prices`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` enum('Solar','Pertalite','Pertamax','Pertamax Turbo') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `cost` double NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of prices
-- ----------------------------
INSERT INTO `prices` VALUES (1, 'Solar', '2021-01-16', 8000, 9400, '2021-01-16 20:12:01', '2021-01-16 20:12:03');
INSERT INTO `prices` VALUES (2, 'Pertalite', '2021-01-16', 6000, 7650, '2021-01-16 20:12:37', '2021-01-16 20:12:39');
INSERT INTO `prices` VALUES (3, 'Pertamax', '2021-01-16', 7000, 9000, '2021-01-16 20:13:01', '2021-01-16 20:13:03');
INSERT INTO `prices` VALUES (4, 'Pertamax Turbo', '2021-01-16', 7200, 9850, '2021-01-16 20:13:33', '2021-01-16 20:13:35');

-- ----------------------------
-- Table structure for transactions
-- ----------------------------
DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `outlet_id` bigint(20) UNSIGNED NOT NULL,
  `price_id` bigint(20) UNSIGNED NOT NULL,
  `police_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stars` enum('1','2','3','4','5') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '3',
  `reviews` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `liters` double NOT NULL,
  `discount` double NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `transactions_employee_id_index`(`employee_id`) USING BTREE,
  INDEX `transactions_outlet_id_index`(`outlet_id`) USING BTREE,
  INDEX `transactions_price_id_index`(`price_id`) USING BTREE,
  CONSTRAINT `transactions_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `transactions_outlet_id_foreign` FOREIGN KEY (`outlet_id`) REFERENCES `outlets` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `transactions_price_id_foreign` FOREIGN KEY (`price_id`) REFERENCES `prices` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transactions
-- ----------------------------
INSERT INTO `transactions` VALUES (1, 2, 1, 3, 'D1520VBC', '5', 'Pelayanan Memuaskan', 20, NULL, '2021-01-16 13:48:03', '2021-01-16 15:26:03');
INSERT INTO `transactions` VALUES (2, 2, 1, 2, 'D1520VBC', '4', 'asdasdasdasd', 10, NULL, '2021-01-16 14:11:05', '2021-01-16 15:27:15');
INSERT INTO `transactions` VALUES (4, 2, 1, 3, 'D1520VBC', '5', 'Pelayanannya baik dan ramah', 20, NULL, '2021-01-17 07:26:25', '2021-01-17 15:21:52');
INSERT INTO `transactions` VALUES (5, 2, 1, 3, 'D1520VBC', '3', NULL, 20, NULL, '2021-01-17 07:27:24', '2021-01-17 07:27:24');
INSERT INTO `transactions` VALUES (8, 2, 1, 4, 'D1520VBC', '3', NULL, 10, NULL, '2021-01-17 08:31:21', '2021-01-17 08:31:21');
INSERT INTO `transactions` VALUES (9, 2, 1, 4, 'D1520VBC', '3', NULL, 10, NULL, '2021-01-17 08:32:04', '2021-01-17 08:32:04');
INSERT INTO `transactions` VALUES (10, 2, 1, 4, 'D1520VBC', '3', NULL, 3, NULL, '2021-01-17 13:12:56', '2021-01-17 13:12:56');
INSERT INTO `transactions` VALUES (12, 2, 1, 3, 'D1520VBC', '3', NULL, 5, 10000, '2021-01-17 13:19:15', '2021-01-17 13:19:15');
INSERT INTO `transactions` VALUES (13, 2, 1, 3, 'D1520VBC', '3', NULL, 5, NULL, '2021-01-17 13:20:10', '2021-01-17 13:20:10');
INSERT INTO `transactions` VALUES (14, 2, 1, 4, 'D1520VBC', '3', NULL, 4, NULL, '2021-01-17 15:09:21', '2021-01-17 15:09:21');
INSERT INTO `transactions` VALUES (15, 2, 1, 3, 'D1520VBC', '3', NULL, 3, NULL, '2021-01-17 15:18:45', '2021-01-17 15:18:45');
INSERT INTO `transactions` VALUES (16, 2, 1, 3, 'D1520VBC', '3', NULL, 5, NULL, '2021-01-17 15:48:21', '2021-01-17 15:48:21');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `outlet_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NULL DEFAULT NULL,
  `role` enum('admin','employee','member') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE,
  INDEX `users_outlet_id_index`(`outlet_id`) USING BTREE,
  CONSTRAINT `users_outlet_id_foreign` FOREIGN KEY (`outlet_id`) REFERENCES `outlets` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, NULL, 'Salim Arizi', 'admin@salim.com', NULL, '$2y$10$uaQ9h3014p4U5NFog4fPeO5fQIkB7eY01JDetms93ev3LBkjFAjGO', NULL, 'admin', NULL, '2021-01-09 14:31:13', '2021-01-09 14:31:13');
INSERT INTO `users` VALUES (2, 1, 'Salim Arizi', 'salim9asmp1pdl@gmail.com', NULL, '$2y$10$d0PNsr2IHIyzhCr157i/jeJI4g3mU6wIAuzdDO9wNe3hH/Cc32AF6', '2021-01-09', 'employee', NULL, '2021-01-09 14:43:03', '2021-01-09 14:43:03');
INSERT INTO `users` VALUES (5, NULL, 'Salim Arizi', 'salim@gmail.com', NULL, '$2y$10$bU1dy917RDUv.h91rSE1beGhlZ0Q9T12yLU4q6349qVYY6Ot.qI4G', '2020-12-30', 'member', NULL, '2021-01-16 13:53:22', '2021-01-16 13:53:22');
INSERT INTO `users` VALUES (8, 1, 'Izira Milas', 'izira@gmail.com', NULL, '$2y$10$13Os/G0vQkGETV4Hnabt7OgTK8noXmGByHWkqu1e8eM2/x/F8bD.6', '2020-12-27', 'employee', NULL, '2021-01-17 04:34:21', '2021-01-17 04:34:21');
INSERT INTO `users` VALUES (9, 3, 'Ryan Nathaniel', 'ryan@gmail.com', NULL, '$2y$10$gprED6JIjb9OIHhQQJq.l.CV9A7OK98DCJ10C28gH.TzjZ/mqMkka', '2020-12-27', 'employee', NULL, '2021-01-17 15:16:34', '2021-01-17 15:16:34');

-- ----------------------------
-- Table structure for vehicles
-- ----------------------------
DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE `vehicles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('car','motocycle') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `police_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `vehicles_user_id_index`(`user_id`) USING BTREE,
  CONSTRAINT `vehicles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of vehicles
-- ----------------------------
INSERT INTO `vehicles` VALUES (1, 5, 'Avanza', 'car', 'D1520VBC', '2021-01-16 21:04:51', '2021-01-17 07:53:33');
INSERT INTO `vehicles` VALUES (3, 5, 'CB150R', 'motocycle', 'D6112UBY', '2021-01-16 14:51:11', '2021-01-17 15:20:53');

SET FOREIGN_KEY_CHECKS = 1;
