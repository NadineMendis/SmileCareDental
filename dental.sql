CREATE DATABASE db_smilecare;

use db_smilecare;

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    user_type ENUM('patient', 'practitioner') NOT NULL
);

CREATE TABLE patients (
    patient_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNIQUE,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    date_of_birth DATE,
    contact_number VARCHAR(20),
    street VARCHAR(255) NOT NULL,
    city VARCHAR(100) NOT NULL,
    state VARCHAR(100) NOT NULL,
    zip VARCHAR(10) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE practitioners (
    practitioner_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNIQUE,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    specialization VARCHAR(100),
    date_of_birth DATE,
    contact_number VARCHAR(20),
    street VARCHAR(255) NOT NULL,
    city VARCHAR(100) NOT NULL,
    state VARCHAR(100) NOT NULL,
    zip VARCHAR(10) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE appointment_types (
    appointment_type_id INT AUTO_INCREMENT PRIMARY KEY,
    type_name VARCHAR(50) NOT NULL,
    description TEXT
);

CREATE TABLE practitioner_appointment_types (
    practitioner_id INT,
    appointment_type_id INT,
    PRIMARY KEY (practitioner_id, appointment_type_id),
    FOREIGN KEY (practitioner_id) REFERENCES practitioners(practitioner_id),
    FOREIGN KEY (appointment_type_id) REFERENCES appointment_types(appointment_type_id)
);

CREATE TABLE appointments (
    appointment_id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT,
    practitioner_id INT,
    appointment_date DATETIME NOT NULL,
    appointment_type_id INT,
    appointment_notes TEXT,
    appointment_status VARCHAR(20) DEFAULT 'active',
    FOREIGN KEY (patient_id) REFERENCES patients(patient_id),
    FOREIGN KEY (practitioner_id) REFERENCES practitioners(practitioner_id),
    FOREIGN KEY (appointment_type_id) REFERENCES appointment_types(appointment_type_id)
);

CREATE TABLE availability (
    availability_id INT AUTO_INCREMENT PRIMARY KEY,
    practitioner_id INT,
    date DATE NOT NULL,
    day_of_week ENUM('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'),
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    FOREIGN KEY (practitioner_id) REFERENCES practitioners(practitioner_id)
);




-- Insert the first user
INSERT INTO users (username, password, email, user_type)
VALUES
    ('user1', 'password1', 'user1@example.com', 'practitioner');

-- Insert the second user
INSERT INTO users (username, password, email, user_type)
VALUES
    ('user2', 'password2', 'user2@example.com', 'practitioner');


-- Insert the first practitioner
INSERT INTO practitioners (user_id, first_name, last_name, specialization, date_of_birth, contact_number, street, city, state, zip)
VALUES
    (1, 'John', 'Doe', 'Dentist', '1980-05-15', '1234567890', '123 Main St', 'Anytown', 'State1', '12345');

-- Insert the second practitioner
INSERT INTO practitioners (user_id, first_name, last_name, specialization, date_of_birth, contact_number, street, city, state, zip)
VALUES
    (2, 'Jane', 'Smith', 'Orthodontist', '1975-08-20', '9876543210', '456 Elm St', 'Othertown', 'State2', '67890');


-- Insert appointment type 1
INSERT INTO appointment_types (type_name, description)
VALUES ('Dental Checkup', 'Regular dental checkup for preventive care.');

-- Insert appointment type 2
INSERT INTO appointment_types (type_name, description)
VALUES ('Teeth Cleaning', 'Professional teeth cleaning to remove plaque and tartar buildup.');

-- Insert appointment type 3
INSERT INTO appointment_types (type_name, description)
VALUES ('Orthodontic Consultation', 'Consultation for orthodontic treatment such as braces or Invisalign.');

-- Insert appointment type 4
INSERT INTO appointment_types (type_name, description)
VALUES ('Root Canal Therapy', 'Treatment for infected or damaged tooth roots.');

-- Insert appointment type 5
INSERT INTO appointment_types (type_name, description)
VALUES ('Tooth Extraction', 'Removal of a tooth due to decay, damage, or overcrowding.');

-- Insert appointment type 6
INSERT INTO appointment_types (type_name, description)
VALUES ('Dental Implant Consultation', 'Consultation for dental implant placement to replace missing teeth.');


-- Insert booking 1
INSERT INTO appointments (patient_id, practitioner_id, appointment_date, appointment_type_id, appointment_notes)
VALUES
    (1, 1, '2024-06-04 13:00:00', 1, 'Appointment booked for dental checkup.');


INSERT INTO appointments (patient_id, practitioner_id, appointment_date, appointment_type_id, appointment_notes)
VALUES
    (1, 1, '2024-06-05 10:00:00', 2, 'Appointment booked for teeth cleaning.');

INSERT INTO appointments (patient_id, practitioner_id, appointment_date, appointment_type_id, appointment_notes)
VALUES
    (1, 1, '2024-06-06 11:15:00', 4, 'Appointment booked for root canal treatment.');

INSERT INTO appointments (patient_id, practitioner_id, appointment_date, appointment_type_id, appointment_notes)
VALUES
    (1, 1, '2024-06-06 15:45:00', 5, 'Appointment booked for tooth extraction.');

INSERT INTO appointments (patient_id, practitioner_id, appointment_date, appointment_type_id, appointment_notes)
VALUES
    (1, 1, '2024-06-07 09:30:00', 6, 'Appointment booked for braces consultation.');



















INSERT INTO users (username, password, email, user_type) VALUES ('john_doe', 'password123', 'john@example.com', 'patient');


INSERT INTO patients (user_id, first_name, last_name, phone_number, address, date_of_birth) 
VALUES (1, 'Alice', 'Johnson', '555-123-4567', '789 Maple St, City, Country', '1995-03-12');


INSERT INTO practitioners (user_id, first_name, last_name, specialization, phone_number, address, date_of_birth) 
VALUES (2, 'Jane', 'Smith', 'Orthodontist', '987-654-3210', '456 Oak St, City, Country', '1980-10-15');

INSERT INTO appointments (patient_id, practitioner_id, appointment_date, appointment_notes) VALUES (1, 1, '2024-05-18 10:00:00', 'Routine checkup');

INSERT INTO availability (practitioner_id, day_of_week, start_time, end_time) 
VALUES (1, 'Monday', '08:00:00', '12:00:00');



