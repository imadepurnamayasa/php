CREATE TABLE `m_konfig` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `m_konfig`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `m_konfig`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;