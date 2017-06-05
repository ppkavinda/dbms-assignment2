# dbms-assignment
database system for dbms assignment\n
sql injection ->-> x'; DROP TABLE members; --

0        Registere Module
0        Registere Students
0        Registere Lecture
0        Insert Module
0  1     Enter results
0  1     Enter exam dates
0  1 2   Search Students
0  1     Search Staff
0  1 2   Show exams
0  1 2   Show modules
0        Update module's lecturers

                        admin   staff   student
        department      all     s       s
        diploma         all     s       s
        diploma_module  all     s       s
        exmas           all     s/i/u   s
        module          all     s       s
        Staff           all     s       s
        staff_module    all     s       s
        Students        all     s       s
        student_exam    all     s/i/u   s

grant select on assignment_test3.* to staff@localhost;
grant inesrt, update, delete on assignment_test3.exams to staff@localhost;
grant inesrt, update, delete on assignment_test3.student_exams to staff@localhost;

grant select on assignment_test3.* to student@localhost;
