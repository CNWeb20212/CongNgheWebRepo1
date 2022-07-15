
INSERT INTO `account` (`ttk`, `mk`, `role`) 
VALUES 
	('20194139', 'tranvanphuc', 'student'), 
	('20194102', 'tranthanhlong', 'student'), 
	('20194185', 'trinhductiep', 'student');


INSERT INTO `student` (`mssv`) VALUES ('20194139'), ('20194185'), ('20194102');


INSERT INTO `profile` (`mssv`, `email`, `gender`, `dateofbirth`, `address`, `decription`, `grade`, `school`, `major`) 
VALUES ('20194139', 'phuc.tv194139@sis.hust.edu.vn', 'Nam', '2001-04-22', 'Hưng Yên', 'Yêu màu tím ghét sự giả dối', 'K64', 'Viện CNTT&TT', 'Khoa học máy tính');


INSERT INTO `user` (`ttk`, `ho`, `dem`, `ten`) 
VALUES 
	('20194139', 'Trần', 'Văn', 'Phúc'), 
	('20194102', 'Trần', 'Thành', 'Long'), 
	('20194185', 'Trịnh', 'Đức', 'Tiệp');


INSERT INTO `friend` (`ttk1`, `ttk2`, `time`) VALUES ('20194139', '20194102', '2001-04-22');


INSERT INTO `friendrequest` (`id`, `sender`, `receiver`, `time`) 
VALUES (NULL, '20194185', '20194139', '2001-04-22');


INSERT INTO `chat` (`id`, `name`, `time`) 
VALUES (NULL, 'Ura', '2001-04-22');


INSERT INTO `user_chat` (`ttk`, `chatid`, `role`, `nickname`, `join_time`, `lastseen_time`) 
VALUES 
	('20194139', '1', 'admin', 'Fuck', '2001-04-22', '2001-04-22'), 
	('20194102', '1', 'member', 'Lòn', '2001-04-22', '2001-04-22'), 
	('20194185', '1', 'member', 'Becgie', '2001-04-22', '2001-04-22');


INSERT INTO `message` (`id`, `ttk`, `chatid`, `content`, `filepath`, `time`) 
VALUES (NULL, '20194139', '1', 'Hello every body! Xin chào tất cả mọi người!', NULL, '2001-04-22');


INSERT INTO `team` (`id`, `name`, `create_time`)
VALUES (NULL, 'Công nghệ web nhóm 39', '2001-04-22');


INSERT INTO `user_team` (`ttk`, `teamid`, `role`, `time`) 
VALUES 
	('20194139', '1', 'admin', '2001-04-22'), 
	('20194102', '1', 'member', '2001-04-22'), 
	('20194185', '1', 'member', '2001-04-22');


INSERT INTO `post` (`id`, `ttk`, `caption`, `filepath`, `time`, `access`, `teamid`) 
VALUES (NULL, '20194139', 'Đây là bài viết đầu tiên!', NULL, '2001-04-22', 'public', NULL);


INSERT INTO `tuongtac` (`id`, `ttk`, `postid`, `time`, `type`, `content`)
VALUES (NULL, '20194185', '1', '2001-04-22', 'comment', 'Ôi bài viết như lồng đèn sáng chói thật lung linh tuyệt vời');


INSERT INTO `announce` (`id`, `ttk`, `type`, `subject`, `verb`, `object`, `time`, `decription`) 
VALUES 
	(NULL, '20194139', 'Yêu cầu kết bạn', '20194185', 'gửi lời mời kết bạn tới', '20194139', '2001-04-22', 'Trịnh Đức Tiệp muốn kết bạn với bạn.'),
	(NULL, '20194185', 'comment', '20194185', 'Đã bình luận vào bài viết 2', '2', '2001-04-22', 'Trịnh Đức Tiệp đã bình luận vào bài viết của bạn!');
