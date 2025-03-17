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

insert into tbl_usuarios values(1,'Elys','Martinez','emartinez229@gmail.com','123456', 1);
insert into tbl_usuarios values(2,'Elys','Martinez','admin@admin.com','$2y$10$eMJjIJyQsw.KHEWwJ1Qs7.E081WF.iFQjunMZ.oUgzvXocj8TBJDm', 1);

-------------------- TABLA LIBROS -------------------
create SEQUENCE IF NOT EXISTS tbl_libros_id_seq
start with 1
increment by 1;

CREATE TABLE IF NOT EXISTS tbl_libros
(
    id integer NOT NULL DEFAULT nextval('tbl_usuarios_id_seq'::regclass),
    codigo text NOT NULL,
    titulo text NOT NULL,
    autor text NOT NULL,
    area text NULL,
    campo text NULL,
    ciudad text NULL,
    editorial text NULL,
    anio_pub text NULL,
    nro_edicion text NOT NULL,
    paginas integer,
    formato text NOT NULL,
    ejemplares text NOT NULL,
    observaciones text NOT NULL,
    cod_barra text NOT NULL,
    estado integer NOT NULL,

    CONSTRAINT tbl_libros_pkey PRIMARY KEY (id)
);