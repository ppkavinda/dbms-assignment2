-- create admin user --------
CREATE USER 'admin'@'localhost';
SET PASSWORD FOR 'admin'@'localhost' = PASSWORD('admin');
-- grant for admin
GRANT ALL PRIVILEGES ON  *.* TO 'admin'@'localhost' ;

-- create user staff
CREATE USER 'staff'@'localhost' ;
SET PASSWORD FOR 'staff'@'localhost' = PASSWORD('staff');
-- grant for staff
GRANT SELECT ON `assignment_test3`.* TO 'staff'@'localhost';
GRANT INSERT, UPDATE, DELETE ON `assignment_test3`.exmas TO 'staff'@'localhost';
GRANT INSERT, UPDATE, DELETE ON `assignment_test3`.student_exam TO 'staff'@'localhost';

-- crearte user student
CREATE USER 'student'@'localhost';
SET PASSWORD FOR 'student'@'localhost' = PASSWORD('student');
-- grant for student
GRANT SELECT ON `assignment_test3`.* TO 'student'@'localhost';
