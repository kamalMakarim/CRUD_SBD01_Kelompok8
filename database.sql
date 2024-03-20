create table if not exists Mahasiswa (
    NIM int unique not null,
    Nama varchar(255) not null,
    Semester int not null check (Semester > 0)
);

create table if not exists Dosen (
    NIDN int unique not null,
    Nama varchar(255) not null,
    KodeMK varchar(255) not null
);

create table if not exists MataKuliah (
    KodeMK varchar(255) unique not null,
    NamaMK varchar(255) not null
);

create table if not exists KelasMahasiswa (
    NIM int not null,
    KodeMK varchar(255) not null
);

drop table if exists Mahasiswa, Dosen, MataKuliah, KelasMahasiswa;

insert into Mahasiswa (NIM, Nama, Semester) values 
    (201001, 'Andika Saputra', 1),
    (201002, 'Bivan Anggie', 3),
    (201003, 'Naval Putra', 5);

insert into Dosen (NIDN, Nama, KodeMK) values 
    (1078523, 'Budi Tama', 'ENG01'),
    (1078524, 'Susi Savitri', 'ENG02'),
    (1078525, 'Andin Putri', 'ENG03'),
    (1078526, 'Pattrick Junior', 'ENG04'),
    (1078527, 'Ricardo Senior', 'ENG05'),
    (1078528, 'Salman Hasid', 'ENG06');

insert into MataKuliah (KodeMK, NamaMK) values 
    ('ENG01', 'Sistem Operasi'),
    ('ENG02', 'Basis Data'),
    ('ENG03', 'Aljabar Linear Lanjut'),
    ('ENG04', 'Organisasi Arsitektur Komputer'),
    ('ENG05', 'Jaringan Komputer');

insert into KelasMahasiswa (NIM, KodeMK) values 
    (201001, 'ENG01'), (201001, 'ENG02'),
    (201002, 'ENG02'), (201002, 'ENG03'),
    (201002, 'ENG04'), (201003, 'ENG01'),
    (201003, 'ENG04'), (201003, 'ENG05');