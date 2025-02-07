-- create the doctors table
CREATE TABLE doctors (
  id INT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  specialty VARCHAR(255) NOT NULL,
  phone VARCHAR(20) NOT NULL
);

-- create the nurses table
CREATE TABLE nurses (
  id INT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  phone VARCHAR(20) NOT NULL
);

-- create the patients table
CREATE TABLE patients (
  id INT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  phone VARCHAR(20) NOT NULL,
  dob DATE NOT NULL,
  admission_date DATETIME NOT NULL,
  discharge_date DATETIME,
  room_id INT,
  FOREIGN KEY (room_id) REFERENCES rooms(id)
);

-- create the bills table
CREATE TABLE bills (
  id INT PRIMARY KEY,
  patient_id INT NOT NULL,
  amount DECIMAL(10,2) NOT NULL,
  description TEXT,
  date_created DATETIME NOT NULL,
  FOREIGN KEY (patient_id) REFERENCES patients(id)
);

-- create the medical records table
CREATE TABLE medical_records (
  id INT PRIMARY KEY,
  patient_id INT NOT NULL,
  doctor_id INT NOT NULL,
  nurse_id INT NOT NULL,
  diagnosis TEXT NOT NULL,
  prescription TEXT,
  date_created DATETIME NOT NULL,
  FOREIGN KEY (patient_id) REFERENCES patients(id),
  FOREIGN KEY(doctor_id) REFERENCES doctors(id),
  FOREIGN KEY (nurse_id) REFERENCES nurses(id)
);

-- create the rooms table
CREATE TABLE rooms (
  id INT PRIMARY KEY,
  room_number INT NOT NULL,
  room_type VARCHAR(255) NOT NULL,
  availability BOOLEAN NOT NULL
);

-- create the appointments table
CREATE TABLE appointments (
  id INT PRIMARY KEY,
  patient_id INT NOT NULL,
  doctor_id INT NOT NULL,
  appointment_date DATETIME NOT NULL,
  FOREIGN KEY (patient_id) REFERENCES patients(id),
  FOREIGN KEY (doctor_id) REFERENCES doctors(id)
);