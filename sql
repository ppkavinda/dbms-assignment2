-- created admin user --------
CREATE USER 'admin'@'localhost' IDENTIFIED WITH mysql_native_password;SET PASSWORD FOR 'admin'@'localhost' = '***';
--grant for admin
GRANT ALL PRIVILEGES ON  *.* TO 'admin'@'localhost' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;

-- create user staff
CREATE USER 'staff'@'localhost' IDENTIFIED WITH mysql_native_password;GRANT USAGE ON *.* TO 'staff'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;SET PASSWORD FOR 'staff'@'localhost' = '***';GRANT ALL PRIVILEGES ON `assignment_test3`.* TO 'staff'@'localhost';
--grant for staff
REVOKE ALL PRIVILEGES ON `assignment_test3`.* FROM 'staff'@'localhost'; GRANT SELECT, INSERT, UPDATE, DELETE ON `assignment_test3`.* TO 'staff'@'localhost';


-- crearte user student
CREATE USER 'student'@'localhost' IDENTIFIED WITH mysql_native_password;GRANT USAGE ON *.* TO 'student'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;SET PASSWORD FOR 'student'@'localhost' = '***';
-- grant for student
GRANT SELECT ON `assignment\_test3`.* TO 'student'@'localhost'
