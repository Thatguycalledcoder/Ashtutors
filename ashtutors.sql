DROP DATABASE if exists ashtutor;
CREATE DATABASE ashtutor;
USE ashtutor;

create table major (
	major_id int not null auto_increment,
    major_name varchar(100) not null,
    primary key(major_id)
);

create table student (
	student_id int not null auto_increment,
    student_fname varchar(70) not null,
    student_lname varchar(70) not null,
    student_email varchar(100) not null,
    student_pass varchar(30) not null,
    student_country varchar(30) not null, 
    student_year varchar(30) not null, 
    student_major int not null, 
    student_contact varchar(15) not null, 
    student_image varchar(100) not null, 
    user_role int not null Default 2,
    primary key(student_id),
    foreign key(student_major) references major(major_id) 
		on update cascade 
		on delete cascade
);

create table tutor (
	tutor_id int not null auto_increment,
    tutor_fname varchar(70) not null,
    tutor_lname varchar(70) not null,
    tutor_email varchar(100) not null,
    tutor_pass varchar(30) not null,
    tutor_country varchar(30) not null, 
    tutor_year varchar(30) not null, 
    tutor_major int not null, 
    tutor_contact varchar(15) not null,
    tutor_image varchar(100) not null,
    tutor_rate decimal(4,2) not null,
    user_role int not null Default 2,
    primary key(tutor_id),
    foreign key(tutor_major) references major(major_id) 
		on update cascade 
		on delete cascade
);

create table course (
	course_id int not null auto_increment,
    course_name varchar(200) not null,
    course_major varchar(100) not null,
    primary key(course_id)
);

create table booking (
	book_id int not null auto_increment,
    student_id int not null,
    tutor_id int not null,
    major int not null,
    course int not null,
    book_day int not null,
    book_time time not null,
    book_hours int not null,
    primary key(book_id),
    foreign key(student_id) references student(student_id) 
		on update cascade 
		on delete cascade,
	foreign key(tutor_id) references tutor(tutor_id) 
		on update cascade 
		on delete cascade,
	foreign key(major) references major(major_id) 
		on update cascade 
		on delete cascade,
	foreign key(course) references course(course_id) 
		on update cascade 
		on delete cascade
);

create table tutor_courses (
	tutor_id int not null,
    course_id int not null,
    foreign key(tutor_id) references tutor(tutor_id)
		on update cascade
        on delete cascade,
	foreign key(course_id) references course(course_id)
		on update cascade
        on delete cascade
);

create table book_days (
	bookday_id int not null,
    book_day varchar(50) not null,
    primary key(bookday_id)
);

insert into book_days(bookday_id, book_day) values(1, "Sunday");
insert into book_days(bookday_id, book_day) values(2, "Monday");
insert into book_days(bookday_id, book_day) values(3, "Tuesday");
insert into book_days(bookday_id, book_day) values(4, "Wednesday");
insert into book_days(bookday_id, book_day) values(5, "Thursday");
insert into book_days(bookday_id, book_day) values(6, "Friday");
insert into book_days(bookday_id, book_day) values(7, "Saturday");

create table tutor_book_day (
	tutor_id int not null,
    bookday_id int not null,
     foreign key(tutor_id) references tutor(tutor_id)
		on update cascade
        on delete cascade,
	foreign key(bookday_id) references book_days(bookday_id)
		on update cascade
        on delete cascade
);

create table tutor_book_time (
	tutor_id int not null,
    booktime TIME NOT NULL,
	foreign key(tutor_id) references tutor(tutor_id)
		on update cascade
        on delete cascade
);

create table book_history (
	bookhist_id int not null auto_increment,
    student_id int not null,
    tutor_id int not null,
    major int not null,
    course int not null,
    book_day int not null,
    book_time time not null,
    book_hours int not null,
    primary key(bookhist_id),
    foreign key(student_id) references student(student_id) 
		on update cascade 
		on delete cascade,
	foreign key(tutor_id) references tutor(tutor_id) 
		on update cascade 
		on delete cascade,
	foreign key(major) references major(major_id) 
		on update cascade 
		on delete cascade,
	foreign key(course) references course(course_id) 
		on update cascade 
		on delete cascade
);

create table payment (
	pay_id int not null auto_increment,
    amount double(4,2) not null,
    currency text not null default "GHS",
    bookhist_id int not null,
    student_id int not null,
    tutor_id int not null,
    payment_date date not null,
    primary key(pay_id),
    foreign key(bookhist_id) references book_history(bookhist_id)
		on update cascade
        on delete cascade,
	foreign key(student_id) references student(student_id) 
		on update cascade 
		on delete cascade,
	foreign key(tutor_id) references tutor(tutor_id) 
		on update cascade 
		on delete cascade
);