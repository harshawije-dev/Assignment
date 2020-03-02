CREATE TABLE `register`
(
`u_id` int
(12) primary key AUTO_INCREMENT,
`first_name` varchar
(100),
`last-name` varchar
(100) not null,
`email` varchar
(100) not null,
`phone` varchar
(12),
`education` varchar'(100)' not null,
`edu_level` varchar'(100)' not null,
`industry` varchar'(100)' not null,
`exp` varchar'(100)' not null
);