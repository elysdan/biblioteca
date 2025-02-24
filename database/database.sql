create SEQUENCE IF NOT EXISTS tbl_usuarios_id_seq
start with 1
increment by 1;

CREATE TABLE IF NOT EXISTS tbl_usuarios
(
    id integer NOT NULL DEFAULT nextval('tbl_usuarios_id_seq'::regclass),
    nombre character varying(30) COLLATE pg_catalog."default" NOT NULL,
    apellido character varying(30) COLLATE pg_catalog."default" NOT NULL,
    correo text NOT NULL,
    contrasena text not NULL,
    estado integer,
    fecha_nac date,
    CONSTRAINT tbl_usuarios_pkey PRIMARY KEY (id)
);

insert into tbl_usuarios values(1,'Elys','Martinez','emartinez229@gmail.com','123456');
insert into tbl_usuarios values(2,'Elys','Martinez','admin@admin.com','$2y$10$eMJjIJyQsw.KHEWwJ1Qs7.E081WF.iFQjunMZ.oUgzvXocj8TBJDm');