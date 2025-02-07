-- create the rooms table
CREATE TABLE rooms (
  id INT PRIMARY KEY,
  room_number INT NOT NULL,
  room_type VARCHAR(255) NOT NULL,
  availability BOOLEAN NOT NULL
);

-- create a stored procedure that inserts rows into the rooms table using a loop
DELIMITER //
CREATE PROCEDURE insert_rooms()
BEGIN
  DECLARE i INT DEFAULT 1000;
  WHILE i <= 1010 DO
    INSERT INTO rooms (id, room_number, room_type, availability) VALUES (i, i, 'Triple', 1);
    SET i = i + 1;
  END WHILE;
END //
DELIMITER ;

CALL insert_rooms();

ALTER TABLE `rooms`
MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1010;



CREATE TABLE admin (
    admin_id VARCHAR(10) NOT NULL,
    admin_name VARCHAR(150) NOT NULL,
    admin_password VARCHAR(150) NOT NULL,
    PRIMARY KEY (admin_id)
);

INSERT INTO admin (admin_id, admin_name, admin_password)
VALUES ('AD001', SHA2('admin', 256), SHA2('mohamed111111', 256));




CREATE TABLE patients (
  patient_id INT PRIMARY KEY,
  name VARCHAR(50),
  date_of_birth DATE,
  gender VARCHAR(10),
  address VARCHAR(100),
  phone_number VARCHAR(20),
  email VARCHAR(100),
  dob DATE NOT NULL,
  admission_date DATETIME NOT NULL,
  discharge_date DATETIME,
  room_id INT,
  FOREIGN KEY (room_id) REFERENCES rooms(id)
);
ALTER TABLE patients
ADD CONSTRAINT unique_email UNIQUE (email);

ALTER TABLE `patients`
MODIFY patient_id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

INSERT INTO patients (name, date_of_birth, gender, address, phone_number, email, dob, admission_date, discharge_date ,room_id)
VALUES
('John Smith', '1990-01-01', 'Male', '123 Main St, Anytown, USA', '555-1234', 'john.smith@email.com', '1990-01-01' ,'2000-01-01','2001-01-01' ,1001),
('Jane Doe', '1985-05-15', 'Female', '456 Elm St, Othertown, USA', '555-5678', 'jane.doe@email.com', '1990-01-01' ,'2000-01-01','2001-01-01' ,1002);



CREATE TABLE doctors (
  doctor_id INT PRIMARY KEY,
  name VARCHAR(50),
  age INT,
  specialty VARCHAR(50),
  phone_number VARCHAR(20),
  email VARCHAR(100)
);
ALTER TABLE doctors
ADD CONSTRAINT unique_email UNIQUE (email);


ALTER TABLE `doctors`
MODIFY doctor_id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

INSERT INTO doctors (name, age, specialty, phone_number, email)
VALUES
('Dr. John Johnson', 50, 'Cardiology', '555-4321', 'john.johnson@email.com'),
('Dr. Jane Smith', 60, 'Pediatrics', '555-8765', 'jane.smith@email.com');



CREATE TABLE nurses (
  nurse_id INT PRIMARY KEY,
  name VARCHAR(50),
  age INT,
  specialty VARCHAR(50),
  phone_number VARCHAR(20),
  email VARCHAR(100),
  room_id INT,
  FOREIGN KEY (room_id) REFERENCES rooms(id)
);

ALTER TABLE `nurses`
MODIFY nurse_id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

INSERT INTO nurses (name, age, specialty, phone_number, email, room_id)
VALUES
('Sarah Lee', 28, 'Pediatrics', '555-1234', 'sarah.lee@email.com', 1001),
('John Doe', 35, 'Cardiology', '555-5678', 'john.doe@email.com', 1002);



CREATE TABLE appointments (
  appointment_id INT PRIMARY KEY,
  patient_id INT,
  doctor_id INT,
  appointment_datetime DATETIME,
  appointment_status VARCHAR(20),
  FOREIGN KEY (patient_id) REFERENCES patients(patient_id),
  FOREIGN KEY (doctor_id) REFERENCES doctors(doctor_id)
);

ALTER TABLE `appointments`
MODIFY appointment_id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

INSERT INTO appointments (patient_id, doctor_id, appointment_datetime, appointment_status)
VALUES
(1, 1, '2023-05-20 10:00:00', 'Scheduled'),
(2, 2, '2023-05-22 09:30:00', 'Scheduled');



CREATE TABLE medical_records (
  record_id INT PRIMARY KEY,
  patient_id INT,
  doctor_id INT,
  nurse_id INT,
  visit_date DATE,
  diagnosis VARCHAR(100),
  treatment_plan VARCHAR(100),
  prescription VARCHAR(100),
  FOREIGN KEY (patient_id) REFERENCES patients(patient_id),
  FOREIGN KEY (doctor_id) REFERENCES doctors(doctor_id),
  FOREIGN KEY (nurse_id) REFERENCES nurses(nurse_id)

);

ALTER TABLE `medical_records`
MODIFY record_id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

INSERT INTO medical_records (patient_id, doctor_id, nurse_id, visit_date, diagnosis, treatment_plan, prescription)
VALUES
(1, 1, 2, '2023-05-20', 'High blood pressure', 'Prescribe medication and diet changes', 'Lisinopril 10mg'),
(2, 2, 1, '2023-05-22', 'Ear infection', 'Prescribe antibiotics', 'Amoxicillin 500mg');




CREATE TABLE bills (
  bill_id INT PRIMARY KEY,
  patient_id INT,
  date_of_service DATE,
  description VARCHAR(100),
  charge DECIMAL(10, 2),
  payment_status VARCHAR(20),
  FOREIGN KEY (patient_id) REFERENCES patients(patient_id)
);

ALTER TABLE `bills`
MODIFY bill_id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

INSERT INTO bills (patient_id, date_of_service, description, charge, payment_status)
VALUES
(1, '2023-05-20', 'Cardiology consultation', 250.00, 'Unpaid'),
(2, '2023-05-22', 'Pediatrics follow-up', 150.00, 'Unpaid');


