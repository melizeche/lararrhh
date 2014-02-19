--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: administradores; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE administradores (
    administrador integer NOT NULL,
    estado character(1) NOT NULL,
    fecha_creacion timestamp without time zone DEFAULT now(),
    fecha_modificacion timestamp without time zone
);


ALTER TABLE public.administradores OWNER TO postgres;

--
-- Name: administradores_administrador_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE administradores_administrador_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.administradores_administrador_seq OWNER TO postgres;

--
-- Name: administradores_administrador_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE administradores_administrador_seq OWNED BY administradores.administrador;


--
-- Name: archivo_x_perfiles; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE archivo_x_perfiles (
    archivo integer NOT NULL,
    perfil integer NOT NULL,
    adjunto character varying(255)
);


ALTER TABLE public.archivo_x_perfiles OWNER TO postgres;

--
-- Name: archivos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE archivos (
    archivo integer NOT NULL,
    tipo_doc character varying(30),
    adjunto character varying(255),
    fecha_creacion timestamp without time zone DEFAULT now(),
    fecha_modificacion timestamp without time zone
);


ALTER TABLE public.archivos OWNER TO postgres;

--
-- Name: archivos_archivo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE archivos_archivo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.archivos_archivo_seq OWNER TO postgres;

--
-- Name: archivos_archivo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE archivos_archivo_seq OWNED BY archivos.archivo;


--
-- Name: carreras_adm; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE carreras_adm (
    carrera integer NOT NULL,
    titulo_cargo character varying(255),
    numero_doc character varying(150),
    fecha_inicio date,
    fecha_fin date,
    usuario integer NOT NULL,
    archivo integer,
    dependencia character varying(50),
    entidad character varying(50),
    rubro character varying(30),
    bonificaciones character varying(30),
    fecha_creacion timestamp without time zone DEFAULT now(),
    fecha_modificacion timestamp without time zone
);


ALTER TABLE public.carreras_adm OWNER TO postgres;

--
-- Name: carreras_adm_carrera_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE carreras_adm_carrera_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.carreras_adm_carrera_seq OWNER TO postgres;

--
-- Name: carreras_adm_carrera_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE carreras_adm_carrera_seq OWNED BY carreras_adm.carrera;


--
-- Name: carreras_x_perfiles; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE carreras_x_perfiles (
    carrera integer NOT NULL,
    perfil integer NOT NULL
);


ALTER TABLE public.carreras_x_perfiles OWNER TO postgres;

--
-- Name: cursosC_x_perfiles; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "cursosC_x_perfiles" (
    "cursoC" integer NOT NULL,
    perfil integer NOT NULL,
    fecha_fin date,
    lugar character varying(30)
);


ALTER TABLE public."cursosC_x_perfiles" OWNER TO postgres;

--
-- Name: cursos_culminados; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cursos_culminados (
    cod_curso integer NOT NULL,
    titulo character varying(255),
    contenido text,
    fecha_inicio date,
    fecha_fin date,
    usuario integer NOT NULL,
    archivo integer,
    perfil integer NOT NULL,
    calificacion character varying(255),
    lugar character varying(30),
    fecha_creacion timestamp without time zone DEFAULT now(),
    fecha_modificacion timestamp without time zone
);


ALTER TABLE public.cursos_culminados OWNER TO postgres;

--
-- Name: cursos_disponibles; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cursos_disponibles (
    cod_curso integer NOT NULL,
    titulo character varying(255),
    contenido text,
    fecha_inicio date,
    fecha_fin date,
    lugar character varying(30),
    fecha_creacion timestamp without time zone DEFAULT now(),
    fecha_modificacion timestamp without time zone,
    costo character varying(30),
    requerimiento integer NOT NULL,
    tipo character varying(2)
);


ALTER TABLE public.cursos_disponibles OWNER TO postgres;

--
-- Name: cursos_disponibles_cod_curso_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cursos_disponibles_cod_curso_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cursos_disponibles_cod_curso_seq OWNER TO postgres;

--
-- Name: cursos_disponibles_cod_curso_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cursos_disponibles_cod_curso_seq OWNED BY cursos_disponibles.cod_curso;


--
-- Name: cursos_x_perfiles; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cursos_x_perfiles (
    cod_curso integer NOT NULL,
    perfil integer NOT NULL,
    fecha_fin date,
    lugar character varying(30)
);


ALTER TABLE public.cursos_x_perfiles OWNER TO postgres;

--
-- Name: cusos_culminados_cod_curso_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cusos_culminados_cod_curso_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cusos_culminados_cod_curso_seq OWNER TO postgres;

--
-- Name: cusos_culminados_cod_curso_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cusos_culminados_cod_curso_seq OWNED BY cursos_culminados.cod_curso;


--
-- Name: evaluacion; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE evaluacion (
    evaluacion integer NOT NULL,
    "nombreEva" character varying(255),
    fecha date,
    puntuacion real,
    perfil integer
);


ALTER TABLE public.evaluacion OWNER TO postgres;

--
-- Name: evaluacion_evaluacion_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE evaluacion_evaluacion_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.evaluacion_evaluacion_seq OWNER TO postgres;

--
-- Name: evaluacion_evaluacion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE evaluacion_evaluacion_seq OWNED BY evaluacion.evaluacion;


--
-- Name: familiares_x_perfil; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE familiares_x_perfil (
    familiar integer NOT NULL,
    enlace_uno integer,
    nombre_paren character varying(255),
    enlace_dos integer
);


ALTER TABLE public.familiares_x_perfil OWNER TO postgres;

--
-- Name: familiares_x_perfil_familiar_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE familiares_x_perfil_familiar_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.familiares_x_perfil_familiar_seq OWNER TO postgres;

--
-- Name: familiares_x_perfil_familiar_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE familiares_x_perfil_familiar_seq OWNED BY familiares_x_perfil.familiar;


--
-- Name: idiomas; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE idiomas (
    idioma integer NOT NULL,
    nombre character varying(255)
);


ALTER TABLE public.idiomas OWNER TO postgres;

--
-- Name: idiomas_idioma_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE idiomas_idioma_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.idiomas_idioma_seq OWNER TO postgres;

--
-- Name: idiomas_idioma_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE idiomas_idioma_seq OWNED BY idiomas.idioma;


--
-- Name: idiomas_x_perfil; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE idiomas_x_perfil (
    idioma integer NOT NULL,
    nombre character varying(255),
    habla character varying(2),
    lee character varying(2),
    escribe character varying(2),
    perfil integer
);


ALTER TABLE public.idiomas_x_perfil OWNER TO postgres;

--
-- Name: perfiles; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE perfiles (
    perfil integer NOT NULL,
    estado character(1) NOT NULL,
    nombre character varying(30) NOT NULL,
    documento character varying(23),
    tipo_documento character varying(30),
    nivel_academico character varying(30),
    especialidad character varying(30),
    documento_comprobante character varying(30),
    direccion character varying(30),
    telefono character varying(30),
    dependencia character varying(30),
    fecha_creacion timestamp without time zone DEFAULT now(),
    fecha_modificacion timestamp without time zone,
    cargo integer,
    estado_civil character varying(30),
    edad integer,
    "estado_F" character varying(30),
    antiguedad integer,
    parentesco character varying(30),
    fecha_de_nac date,
    evaluacion integer,
    idioma character varying(30)
);


ALTER TABLE public.perfiles OWNER TO postgres;

--
-- Name: perfiles_perfil_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE perfiles_perfil_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.perfiles_perfil_seq OWNER TO postgres;

--
-- Name: perfiles_perfil_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE perfiles_perfil_seq OWNED BY perfiles.perfil;


--
-- Name: requerimientos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE requerimientos (
    requerimiento integer NOT NULL,
    cargo character varying(30),
    titulo character varying(30),
    visa character varying(30),
    antiguedad date,
    pais character varying(30),
    fecha_creacion timestamp without time zone DEFAULT now(),
    fecha_modificacion timestamp without time zone
);


ALTER TABLE public.requerimientos OWNER TO postgres;

--
-- Name: requerimientos_requerimiento_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE requerimientos_requerimiento_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.requerimientos_requerimiento_seq OWNER TO postgres;

--
-- Name: requerimientos_requerimiento_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE requerimientos_requerimiento_seq OWNED BY requerimientos.requerimiento;


--
-- Name: requerimientos_x_cursos_disponibles; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE requerimientos_x_cursos_disponibles (
    requerimiento integer NOT NULL,
    "cursoD" integer NOT NULL,
    titulo character varying(30)
);


ALTER TABLE public.requerimientos_x_cursos_disponibles OWNER TO postgres;

--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE users (
    usuario integer NOT NULL,
    administrador integer,
    "user" character varying(30) NOT NULL,
    password character varying(255) NOT NULL,
    nombre character varying(255) NOT NULL,
    estado character(1) NOT NULL,
    email character varying(30),
    perfil integer,
    fecha_creacion timestamp without time zone DEFAULT now(),
    fecha_modificacion timestamp without time zone,
    id integer NOT NULL,
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- Name: users_usuario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE users_usuario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_usuario_seq OWNER TO postgres;

--
-- Name: users_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE users_usuario_seq OWNED BY users.usuario;


--
-- Name: administrador; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY administradores ALTER COLUMN administrador SET DEFAULT nextval('administradores_administrador_seq'::regclass);


--
-- Name: archivo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY archivos ALTER COLUMN archivo SET DEFAULT nextval('archivos_archivo_seq'::regclass);


--
-- Name: carrera; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY carreras_adm ALTER COLUMN carrera SET DEFAULT nextval('carreras_adm_carrera_seq'::regclass);


--
-- Name: cod_curso; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cursos_culminados ALTER COLUMN cod_curso SET DEFAULT nextval('cusos_culminados_cod_curso_seq'::regclass);


--
-- Name: cod_curso; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cursos_disponibles ALTER COLUMN cod_curso SET DEFAULT nextval('cursos_disponibles_cod_curso_seq'::regclass);


--
-- Name: evaluacion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY evaluacion ALTER COLUMN evaluacion SET DEFAULT nextval('evaluacion_evaluacion_seq'::regclass);


--
-- Name: familiar; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY familiares_x_perfil ALTER COLUMN familiar SET DEFAULT nextval('familiares_x_perfil_familiar_seq'::regclass);


--
-- Name: idioma; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY idiomas ALTER COLUMN idioma SET DEFAULT nextval('idiomas_idioma_seq'::regclass);


--
-- Name: perfil; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY perfiles ALTER COLUMN perfil SET DEFAULT nextval('perfiles_perfil_seq'::regclass);


--
-- Name: requerimiento; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY requerimientos ALTER COLUMN requerimiento SET DEFAULT nextval('requerimientos_requerimiento_seq'::regclass);


--
-- Name: usuario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users ALTER COLUMN usuario SET DEFAULT nextval('users_usuario_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- Data for Name: administradores; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY administradores (administrador, estado, fecha_creacion, fecha_modificacion) FROM stdin;
1	A	2014-02-15 00:00:00	\N
2	A	2014-02-15 18:49:32.186329	\N
3	I	2014-02-15 18:49:36.589157	\N
4	A	2014-02-15 18:49:38.819567	\N
\.


--
-- Name: administradores_administrador_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('administradores_administrador_seq', 4, true);


--
-- Data for Name: archivo_x_perfiles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY archivo_x_perfiles (archivo, perfil, adjunto) FROM stdin;
1	2	aaaaaaaaaaaa
\.


--
-- Data for Name: archivos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY archivos (archivo, tipo_doc, adjunto, fecha_creacion, fecha_modificacion) FROM stdin;
1	CI	c.jpg	2014-02-15 18:57:41.253598	\N
2	DOC	a.gif	2014-02-15 18:57:52.896148	\N
\.


--
-- Name: archivos_archivo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('archivos_archivo_seq', 2, true);


--
-- Data for Name: carreras_adm; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY carreras_adm (carrera, titulo_cargo, numero_doc, fecha_inicio, fecha_fin, usuario, archivo, dependencia, entidad, rubro, bonificaciones, fecha_creacion, fecha_modificacion) FROM stdin;
1	Presidente	222	2014-01-01	2014-06-01	1	1	IT	XXX	59	NO	2014-02-15 18:59:48.342714	\N
5	Limpiador	333	2014-01-01	2014-12-31	4	2	GOC	ZZZ	42	SI	2014-02-15 19:00:47.784606	\N
\.


--
-- Name: carreras_adm_carrera_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('carreras_adm_carrera_seq', 5, true);


--
-- Data for Name: carreras_x_perfiles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY carreras_x_perfiles (carrera, perfil) FROM stdin;
1	1
\.


--
-- Data for Name: cursosC_x_perfiles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "cursosC_x_perfiles" ("cursoC", perfil, fecha_fin, lugar) FROM stdin;
1	1	2014-02-18	Narnia
1	2	2014-02-17	Narnia
\.


--
-- Data for Name: cursos_culminados; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cursos_culminados (cod_curso, titulo, contenido, fecha_inicio, fecha_fin, usuario, archivo, perfil, calificacion, lugar, fecha_creacion, fecha_modificacion) FROM stdin;
1	Natacion con Gremlims	Algo	2013-01-01	2013-06-01	1	1	1	10	NArnia	2014-02-15 19:18:51.407945	\N
\.


--
-- Data for Name: cursos_disponibles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cursos_disponibles (cod_curso, titulo, contenido, fecha_inicio, fecha_fin, lugar, fecha_creacion, fecha_modificacion, costo, requerimiento, tipo) FROM stdin;
1	Cocina 101	Cocinando niños	2014-01-01	2014-06-05	Eter	2014-02-15 19:13:20.392274	\N	150000	1	\N
2	Cocina Avanzada	Cocinando Pokemones	2016-07-01	2014-12-25	Mburivicharoga	2014-02-15 19:14:19.902588	\N	300000	2	\N
3	Baño de Gremlins	Muerte y destrucción	2014-02-16	2014-02-22	Mordor	\N	\N	300000	1	\N
\.


--
-- Name: cursos_disponibles_cod_curso_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cursos_disponibles_cod_curso_seq', 3, true);


--
-- Data for Name: cursos_x_perfiles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cursos_x_perfiles (cod_curso, perfil, fecha_fin, lugar) FROM stdin;
3	2	2014-02-27	\N
\.


--
-- Name: cusos_culminados_cod_curso_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cusos_culminados_cod_curso_seq', 1, true);


--
-- Data for Name: evaluacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY evaluacion (evaluacion, "nombreEva", fecha, puntuacion, perfil) FROM stdin;
1	Eva1	2014-02-18	10.6999998	1
\.


--
-- Name: evaluacion_evaluacion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('evaluacion_evaluacion_seq', 1, false);


--
-- Data for Name: familiares_x_perfil; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY familiares_x_perfil (familiar, enlace_uno, nombre_paren, enlace_dos) FROM stdin;
1	1	Son Primos	2
\.


--
-- Name: familiares_x_perfil_familiar_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('familiares_x_perfil_familiar_seq', 1, false);


--
-- Data for Name: idiomas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY idiomas (idioma, nombre) FROM stdin;
1	Ingles
2	Espanhol
4	Klingon
\.


--
-- Name: idiomas_idioma_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('idiomas_idioma_seq', 1, true);


--
-- Data for Name: idiomas_x_perfil; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY idiomas_x_perfil (idioma, nombre, habla, lee, escribe, perfil) FROM stdin;
\.


--
-- Data for Name: perfiles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY perfiles (perfil, estado, nombre, documento, tipo_documento, nivel_academico, especialidad, documento_comprobante, direccion, telefono, dependencia, fecha_creacion, fecha_modificacion, cargo, estado_civil, edad, "estado_F", antiguedad, parentesco, fecha_de_nac, evaluacion, idioma) FROM stdin;
1	A	Perfil 1	doc	CI	Doctorado	IT	?	aaaa	3333	GOC	2014-02-15 18:51:50.222866	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2	A	Perdil2	doc2	PA	Secundario	Derecho	223	bbbb	5555	LEgal	2014-02-15 18:54:52.629264	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
\.


--
-- Name: perfiles_perfil_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('perfiles_perfil_seq', 2, true);


--
-- Data for Name: requerimientos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY requerimientos (requerimiento, cargo, titulo, visa, antiguedad, pais, fecha_creacion, fecha_modificacion) FROM stdin;
1	Overlord	OL	S	2002-01-01	PY	2014-02-15 18:56:10.818333	\N
2	Slave	Sl.	N	2000-01-01	AR	2014-02-15 18:56:36.73949	\N
\.


--
-- Name: requerimientos_requerimiento_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('requerimientos_requerimiento_seq', 2, true);


--
-- Data for Name: requerimientos_x_cursos_disponibles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY requerimientos_x_cursos_disponibles (requerimiento, "cursoD", titulo) FROM stdin;
1	2	Superman
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY users (usuario, administrador, "user", password, nombre, estado, email, perfil, fecha_creacion, fecha_modificacion, id, created_at, updated_at) FROM stdin;
4	1	gaulth	123445	Gaulth	A	gg@g.com	1	2014-02-15 18:53:47.371368	\N	2	\N	\N
1	1	melizeche	333$2y$10$xXbsHgQeYzpwdtcEcPXlGuUR8rsBMXkjlj89Sny84OtLNoJPiSaLu	Marce	A	melizeche@gmail.com	1	2014-02-15 18:52:54.091043	\N	1	\N	\N
5	\N	philipbrown	$2y$10$ozH1.SMn.L/XBx6Jxfb0XeLKEV6C7fhFO4vYU718Ax/71wEti7Uiu	Philipp Brown	A	phil	\N	2014-02-18 03:28:39.450043	\N	3	2014-02-18 06:28:39	2014-02-18 06:28:39
6	\N	robert	$2y$10$ek4A8abjRcJS6g5DrRCph.pU3Od90GSRbQzWK1Twdx3L18XtIls2e	Roberto	A	r@r.com	\N	2014-02-18 03:30:15.092108	\N	4	2014-02-18 06:30:15	2014-02-18 06:30:15
7	\N	marce	$2y$10$b0rmVp1O/ig.j121oChJCeSkgSEcUeU72v/VjmJhyN.Jk1uUU/nJS	Marce E	A	marce@byloop.net	\N	2014-02-18 17:45:44.525472	\N	5	2014-02-18 20:45:44	2014-02-18 20:45:44
8	\N	gaulth	$2y$10$5zTc4T6rxNlsst6n1i.ruOVDBZYvvtTnyHKgVjSDEXw5RA3b.iAxW	Gabriel	A	g@g.com	\N	2014-02-18 17:50:45.754544	\N	6	2014-02-18 20:50:45	2014-02-18 20:50:45
9	\N	pepe	$2y$10$krusUD7DXQ3thx786MPNq.8LqM1EPiUnrAfUnDThD3WKUeVMIP2lq	pepe	A	p@p.com	\N	2014-02-18 17:52:46.505286	\N	7	2014-02-18 20:52:46	2014-02-18 20:52:46
10	\N	xxx	$2y$10$QOnzgfttK5E1A1lkwAJvN.9fhLGCBpWvz3CF3M9eBRIrIdLmhi1Ey	xxx	A	xxx@xxx.com	\N	2014-02-18 18:02:25.019222	\N	8	2014-02-18 21:02:25	2014-02-18 21:02:25
11	\N	aaa	$2y$10$1o1vg1PJsIRgnKl1ws7vo.pT4FqXbbpXXKKbaO5Oi1oCfdwvoioIm	aaa	A	aa@aa.com	\N	2014-02-18 19:15:36.937359	\N	9	2014-02-18 22:15:36	2014-02-18 22:15:36
12	\N	qqq	$2y$10$YnCStP9pWNQeaK6dX.24sO58rM2y1pAeGvJglfU2CGRVXcr0TtqMm	qqq	A	q@q.com	\N	2014-02-18 19:21:43.157463	\N	10	2014-02-18 22:21:43	2014-02-18 22:21:43
\.


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('users_id_seq', 10, true);


--
-- Name: users_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('users_usuario_seq', 12, true);


--
-- Name: administradores_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY administradores
    ADD CONSTRAINT administradores_pkey PRIMARY KEY (administrador);


--
-- Name: archivo_x_perfiles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY archivo_x_perfiles
    ADD CONSTRAINT archivo_x_perfiles_pkey PRIMARY KEY (archivo, perfil);


--
-- Name: archivos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY archivos
    ADD CONSTRAINT archivos_pkey PRIMARY KEY (archivo);


--
-- Name: carreras_adm_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY carreras_adm
    ADD CONSTRAINT carreras_adm_pkey PRIMARY KEY (carrera) WITH (fillfactor=100);


--
-- Name: carreras_x_perfiles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY carreras_x_perfiles
    ADD CONSTRAINT carreras_x_perfiles_pkey PRIMARY KEY (carrera, perfil);


--
-- Name: cursosC_x_perfiles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "cursosC_x_perfiles"
    ADD CONSTRAINT "cursosC_x_perfiles_pkey" PRIMARY KEY ("cursoC", perfil);


--
-- Name: cursos_disponibles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cursos_disponibles
    ADD CONSTRAINT cursos_disponibles_pkey PRIMARY KEY (cod_curso) WITH (fillfactor=100);


--
-- Name: cursos_x_perfiles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cursos_x_perfiles
    ADD CONSTRAINT cursos_x_perfiles_pkey PRIMARY KEY (cod_curso, perfil) WITH (fillfactor=100);


--
-- Name: cusos_culminados_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cursos_culminados
    ADD CONSTRAINT cusos_culminados_pkey PRIMARY KEY (cod_curso) WITH (fillfactor=100);


--
-- Name: evaluacion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY evaluacion
    ADD CONSTRAINT evaluacion_pkey PRIMARY KEY (evaluacion);


--
-- Name: familiares_x_perfil_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY familiares_x_perfil
    ADD CONSTRAINT familiares_x_perfil_pkey PRIMARY KEY (familiar);


--
-- Name: idiomas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY idiomas
    ADD CONSTRAINT idiomas_pkey PRIMARY KEY (idioma);


--
-- Name: idiomas_x_perfil_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY idiomas_x_perfil
    ADD CONSTRAINT idiomas_x_perfil_pkey PRIMARY KEY (idioma);


--
-- Name: perfiles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY perfiles
    ADD CONSTRAINT perfiles_pkey PRIMARY KEY (perfil);


--
-- Name: requerimientos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY requerimientos
    ADD CONSTRAINT requerimientos_pkey PRIMARY KEY (requerimiento);


--
-- Name: requerimientos_x_cursos_disponibles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY requerimientos_x_cursos_disponibles
    ADD CONSTRAINT requerimientos_x_cursos_disponibles_pkey PRIMARY KEY (requerimiento, "cursoD");


--
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (usuario);


--
-- Name: Foreign_key01; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY requerimientos_x_cursos_disponibles
    ADD CONSTRAINT "Foreign_key01" FOREIGN KEY ("cursoD") REFERENCES cursos_disponibles(cod_curso);


--
-- Name: Foreign_key01; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY archivo_x_perfiles
    ADD CONSTRAINT "Foreign_key01" FOREIGN KEY (perfil) REFERENCES perfiles(perfil);


--
-- Name: Foreign_key01; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY carreras_x_perfiles
    ADD CONSTRAINT "Foreign_key01" FOREIGN KEY (perfil) REFERENCES perfiles(perfil);


--
-- Name: Foreign_key01; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "cursosC_x_perfiles"
    ADD CONSTRAINT "Foreign_key01" FOREIGN KEY (perfil) REFERENCES perfiles(perfil);


--
-- Name: Foreign_key01; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY perfiles
    ADD CONSTRAINT "Foreign_key01" FOREIGN KEY (cargo) REFERENCES carreras_adm(carrera);


--
-- Name: Foreign_key01; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY familiares_x_perfil
    ADD CONSTRAINT "Foreign_key01" FOREIGN KEY (enlace_uno) REFERENCES perfiles(perfil);


--
-- Name: Foreign_key01; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY idiomas_x_perfil
    ADD CONSTRAINT "Foreign_key01" FOREIGN KEY (idioma) REFERENCES idiomas(idioma);


--
-- Name: Foreign_key01; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY evaluacion
    ADD CONSTRAINT "Foreign_key01" FOREIGN KEY (perfil) REFERENCES perfiles(perfil);


--
-- Name: Foreign_key01; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cursos_x_perfiles
    ADD CONSTRAINT "Foreign_key01" FOREIGN KEY (perfil) REFERENCES perfiles(perfil);


--
-- Name: Foreign_key02; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY archivo_x_perfiles
    ADD CONSTRAINT "Foreign_key02" FOREIGN KEY (archivo) REFERENCES archivos(archivo);


--
-- Name: Foreign_key02; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY carreras_x_perfiles
    ADD CONSTRAINT "Foreign_key02" FOREIGN KEY (carrera) REFERENCES carreras_adm(carrera);


--
-- Name: Foreign_key02; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "cursosC_x_perfiles"
    ADD CONSTRAINT "Foreign_key02" FOREIGN KEY ("cursoC") REFERENCES cursos_culminados(cod_curso);


--
-- Name: Foreign_key02; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY familiares_x_perfil
    ADD CONSTRAINT "Foreign_key02" FOREIGN KEY (enlace_dos) REFERENCES perfiles(perfil);


--
-- Name: Foreign_key02; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY idiomas_x_perfil
    ADD CONSTRAINT "Foreign_key02" FOREIGN KEY (perfil) REFERENCES perfiles(perfil);


--
-- Name: Foreign_key02; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cursos_x_perfiles
    ADD CONSTRAINT "Foreign_key02" FOREIGN KEY (cod_curso) REFERENCES cursos_disponibles(cod_curso);


--
-- Name: fk_admin; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users
    ADD CONSTRAINT fk_admin FOREIGN KEY (administrador) REFERENCES administradores(administrador);


--
-- Name: fk_archivo; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY carreras_adm
    ADD CONSTRAINT fk_archivo FOREIGN KEY (archivo) REFERENCES archivos(archivo);


--
-- Name: fk_archivo; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cursos_culminados
    ADD CONSTRAINT fk_archivo FOREIGN KEY (archivo) REFERENCES archivos(archivo);


--
-- Name: fk_perfil; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cursos_culminados
    ADD CONSTRAINT fk_perfil FOREIGN KEY (perfil) REFERENCES perfiles(perfil);


--
-- Name: fk_perfil; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users
    ADD CONSTRAINT fk_perfil FOREIGN KEY (perfil) REFERENCES perfiles(perfil);


--
-- Name: fk_req; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY requerimientos_x_cursos_disponibles
    ADD CONSTRAINT fk_req FOREIGN KEY (requerimiento) REFERENCES requerimientos(requerimiento);


--
-- Name: fk_user; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY carreras_adm
    ADD CONSTRAINT fk_user FOREIGN KEY (usuario) REFERENCES users(usuario);


--
-- Name: fk_user; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cursos_culminados
    ADD CONSTRAINT fk_user FOREIGN KEY (usuario) REFERENCES users(usuario);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

