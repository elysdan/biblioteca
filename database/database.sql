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


-------------------- TABLA AREAS -------------------

create SEQUENCE IF NOT EXISTS tbl_areas_id_seq
start with 1
increment by 1;

CREATE TABLE IF NOT EXISTS tbl_areas
(
    id integer NOT NULL DEFAULT nextval('tbl_areas_id_seq'::regclass),
    codigo text NOT NULL,
    nombre_area_P text NULL,
    nombre_area_H text NULL,
    estado integer NOT NULL,

    CONSTRAINT tbl_areas_pkey PRIMARY KEY (id)
);

----- insert de ejemplo -------
INSERT INTO public.tbl_areas
(id, codigo, nombre_area_p, nombre_area_h, estado)
VALUES(nextval('tbl_areas_id_seq'::regclass), '001', '', 'Conocimiento', 1);


-------------------- TABLA CAMPOS -------------------

create SEQUENCE IF NOT EXISTS tbl_campos_id_seq
start with 1
increment by 1;

CREATE TABLE IF NOT EXISTS tbl_campos
(
    id integer NOT NULL DEFAULT nextval('tbl_campos_id_seq'::regclass),
    codigo text NOT NULL,
    nombre_campo text NULL,
    estado integer NOT NULL,

    CONSTRAINT tbl_campos_pkey PRIMARY KEY (id)
);
----- insert de ejemplo -------
INSERT INTO public.tbl_campos
(id, codigo, nombre_campo, estado)
VALUES(nextval('tbl_campos_id_seq'::regclass), '050', 'Publicaciones seriadas generales', 1);



-------------------- TABLA EDITORIALES -------------------

create SEQUENCE IF NOT EXISTS tbl_editoriales_id_seq
start with 1
increment by 1;

CREATE TABLE IF NOT EXISTS tbl_editoriales
(
    id integer NOT NULL DEFAULT nextval('tbl_editoriales_id_seq'::regclass),
    codigo text NOT NULL,
    nombre_editorial text NULL,
    descripcion text NULL,
    estado integer NOT NULL,

    CONSTRAINT tbl_editoriales_pkey PRIMARY KEY (id)
);
----- insert de ejemplo -------
INSERT INTO public.tbl_editoriales
(id, codigo, nombre_editorial, estado)
VALUES(nextval('tbl_editoriales_id_seq'::regclass), '050', 'Publicaciones seriadas generales', 1);