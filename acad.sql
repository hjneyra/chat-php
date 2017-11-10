CREATE TABLE alumno (
    codigo VARCHAR(16) PRIMARY KEY,
    nombres VARCHAR(32),
    apellido_paterno VARCHAR(32) NOT NULL,
    apellido_materno VARCHAR(32),
    fecha_nacimiento DATE
);

INSERT INTO alumno (codigo, nombres, apellido_paterno, fecha_nacimiento) VALUES 
  ('ALUM-001', 'Juan', 'Perez', '1990-05-23'),
  ('ALUM-021', 'Carlos', 'Castro', '1992-12-21'),
  ('ALUM-023', 'Maria', 'Mendoza', '1995-08-03');
  

SELECT codigo, apellido_paterno, fecha_nacimiento FROM alumno 
WHERE fecha_nacimiento > '1993-01-01';


UPDATE alumno SET apellido_materno='Ruiz', fecha_nacimiento='1993-12-21'
 WHERE codigo='ALUM-021';
 

DELETE FROM alumno WHERE codigo='ALUM-001';