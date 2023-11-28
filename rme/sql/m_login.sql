CREATE TABLE `m_login` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `m_login`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `m_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;