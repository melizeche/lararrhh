--
-- PostgreSQL database dump
--

-- Dumped from database version 9.1.11
-- Dumped by pg_dump version 9.3.1
-- Started on 2014-02-18 00:35:25

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 189 (class 3079 OID 11719)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2125 (class 0 OID 0)
-- Dependencies: 189
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 164 (class 1259 OID 18411)
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
-- TOC entry 163 (class 1259 OID 18409)
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
-- TOC entry 2126 (class 0 OID 0)
-- Dependencies: 163
-- Name: administradores_administrador_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE administradores_administrador_seq OWNED BY administradores.administrador;


--
-- TOC entry 178 (class 1259 OID 18594)
-- Name: archivo_x_perfiles; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE archivo_x_perfiles (
    archivo integer NOT NULL,
    perfil integer NOT NULL,
    adjunto character varying(255)
);


ALTER TABLE public.archivo_x_perfiles OWNER TO postgres;

--
-- TOC entry 170 (class 1259 OID 18467)
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
-- TOC entry 169 (class 1259 OID 18465)
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
-- TOC entry 2127 (class 0 OID 0)
-- Dependencies: 169
-- Name: archivos_archivo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE archivos_archivo_seq OWNED BY archivos.archivo;


--
-- TOC entry 168 (class 1259 OID 18459)
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
-- TOC entry 167 (class 1259 OID 18457)
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
-- TOC entry 2128 (class 0 OID 0)
-- Dependencies: 167
-- Name: carreras_adm_carrera_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE carreras_adm_carrera_seq OWNED BY carreras_adm.carrera;


--
-- TOC entry 179 (class 1259 OID 18609)
-- Name: carreras_x_perfiles; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE carreras_x_perfiles (
    carrera integer NOT NULL,
    perfil integer NOT NULL
);


ALTER TABLE public.carreras_x_perfiles OWNER TO postgres;

--
-- TOC entry 180 (class 1259 OID 18626)
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
-- TOC entry 172 (class 1259 OID 18499)
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
-- TOC entry 173 (class 1259 OID 18533)
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
-- TOC entry 174 (class 1259 OID 18536)
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
-- TOC entry 2129 (class 0 OID 0)
-- Dependencies: 174
-- Name: cursos_disponibles_cod_curso_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cursos_disponibles_cod_curso_seq OWNED BY cursos_disponibles.cod_curso;


--
-- TOC entry 188 (class 1259 OID 18779)
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
-- TOC entry 171 (class 1259 OID 18497)
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
-- TOC entry 2130 (class 0 OID 0)
-- Dependencies: 171
-- Name: cusos_culminados_cod_curso_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cusos_culminados_cod_curso_seq OWNED BY cursos_culminados.cod_curso;


--
-- TOC entry 187 (class 1259 OID 18742)
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
-- TOC entry 186 (class 1259 OID 18740)
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
-- TOC entry 2131 (class 0 OID 0)
-- Dependencies: 186
-- Name: evaluacion_evaluacion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE evaluacion_evaluacion_seq OWNED BY evaluacion.evaluacion;


--
-- TOC entry 182 (class 1259 OID 18700)
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
-- TOC entry 181 (class 1259 OID 18698)
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
-- TOC entry 2132 (class 0 OID 0)
-- Dependencies: 181
-- Name: familiares_x_perfil_familiar_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE familiares_x_perfil_familiar_seq OWNED BY familiares_x_perfil.familiar;


--
-- TOC entry 184 (class 1259 OID 18718)
-- Name: idiomas; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE idiomas (
    idioma integer NOT NULL,
    nombre character varying(255)
);


ALTER TABLE public.idiomas OWNER TO postgres;

--
-- TOC entry 183 (class 1259 OID 18716)
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
-- TOC entry 2133 (class 0 OID 0)
-- Dependencies: 183
-- Name: idiomas_idioma_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE idiomas_idioma_seq OWNED BY idiomas.idioma;


--
-- TOC entry 185 (class 1259 OID 18725)
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
-- TOC entry 166 (class 1259 OID 18428)
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
-- TOC entry 165 (class 1259 OID 18426)
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
-- TOC entry 2134 (class 0 OID 0)
-- Dependencies: 165
-- Name: perfiles_perfil_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE perfiles_perfil_seq OWNED BY perfiles.perfil;


--
-- TOC entry 176 (class 1259 OID 18560)
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
-- TOC entry 175 (class 1259 OID 18558)
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
-- TOC entry 2135 (class 0 OID 0)
-- Dependencies: 175
-- Name: requerimientos_requerimiento_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE requerimientos_requerimiento_seq OWNED BY requerimientos.requerimiento;


--
-- TOC entry 177 (class 1259 OID 18577)
-- Name: requerimientos_x_cursos_disponibles; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE requerimientos_x_cursos_disponibles (
    requerimiento integer NOT NULL,
    "cursoD" integer NOT NULL,
    titulo character varying(30)
);


ALTER TABLE public.requerimientos_x_cursos_disponibles OWNER TO postgres;

--
-- TOC entry 162 (class 1259 OID 18391)
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
    fecha_modificacion timestamp without time zone
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 161 (class 1259 OID 18389)
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
-- TOC entry 2136 (class 0 OID 0)
-- Dependencies: 161
-- Name: users_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE users_usuario_seq OWNED BY users.usuario;


--
-- TOC entry 1915 (class 2604 OID 18414)
-- Name: administrador; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY administradores ALTER COLUMN administrador SET DEFAULT nextval('administradores_administrador_seq'::regclass);


--
-- TOC entry 1921 (class 2604 OID 18470)
-- Name: archivo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY archivos ALTER COLUMN archivo SET DEFAULT nextval('archivos_archivo_seq'::regclass);


--
-- TOC entry 1919 (class 2604 OID 18462)
-- Name: carrera; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY carreras_adm ALTER COLUMN carrera SET DEFAULT nextval('carreras_adm_carrera_seq'::regclass);


--
-- TOC entry 1923 (class 2604 OID 18502)
-- Name: cod_curso; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cursos_culminados ALTER COLUMN cod_curso SET DEFAULT nextval('cusos_culminados_cod_curso_seq'::regclass);


--
-- TOC entry 1925 (class 2604 OID 18538)
-- Name: cod_curso; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cursos_disponibles ALTER COLUMN cod_curso SET DEFAULT nextval('cursos_disponibles_cod_curso_seq'::regclass);


--
-- TOC entry 1931 (class 2604 OID 18745)
-- Name: evaluacion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY evaluacion ALTER COLUMN evaluacion SET DEFAULT nextval('evaluacion_evaluacion_seq'::regclass);


--
-- TOC entry 1929 (class 2604 OID 18703)
-- Name: familiar; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY familiares_x_perfil ALTER COLUMN familiar SET DEFAULT nextval('familiares_x_perfil_familiar_seq'::regclass);


--
-- TOC entry 1930 (class 2604 OID 18721)
-- Name: idioma; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY idiomas ALTER COLUMN idioma SET DEFAULT nextval('idiomas_idioma_seq'::regclass);


--
-- TOC entry 1917 (class 2604 OID 18431)
-- Name: perfil; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY perfiles ALTER COLUMN perfil SET DEFAULT nextval('perfiles_perfil_seq'::regclass);


--
-- TOC entry 1927 (class 2604 OID 18563)
-- Name: requerimiento; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY requerimientos ALTER COLUMN requerimiento SET DEFAULT nextval('requerimientos_requerimiento_seq'::regclass);


--
-- TOC entry 1913 (class 2604 OID 18394)
-- Name: usuario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users ALTER COLUMN usuario SET DEFAULT nextval('users_usuario_seq'::regclass);


--
-- TOC entry 2093 (class 0 OID 18411)
-- Dependencies: 164
-- Data for Name: administradores; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY administradores (administrador, estado, fecha_creacion, fecha_modificacion) FROM stdin;
1	A	2014-02-15 00:00:00	\N
2	A	2014-02-15 18:49:32.186329	\N
3	I	2014-02-15 18:49:36.589157	\N
4	A	2014-02-15 18:49:38.819567	\N
\.


--
-- TOC entry 2137 (class 0 OID 0)
-- Dependencies: 163
-- Name: administradores_administrador_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('administradores_administrador_seq', 4, true);


--
-- TOC entry 2107 (class 0 OID 18594)
-- Dependencies: 178
-- Data for Name: archivo_x_perfiles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY archivo_x_perfiles (archivo, perfil, adjunto) FROM stdin;
1	2	aaaaaaaaaaaa
\.


--
-- TOC entry 2099 (class 0 OID 18467)
-- Dependencies: 170
-- Data for Name: archivos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY archivos (archivo, tipo_doc, adjunto, fecha_creacion, fecha_modificacion) FROM stdin;
1	CI	c.jpg	2014-02-15 18:57:41.253598	\N
2	DOC	a.gif	2014-02-15 18:57:52.896148	\N
\.


--
-- TOC entry 2138 (class 0 OID 0)
-- Dependencies: 169
-- Name: archivos_archivo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('archivos_archivo_seq', 2, true);


--
-- TOC entry 2097 (class 0 OID 18459)
-- Dependencies: 168
-- Data for Name: carreras_adm; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY carreras_adm (carrera, titulo_cargo, numero_doc, fecha_inicio, fecha_fin, usuario, archivo, dependencia, entidad, rubro, bonificaciones, fecha_creacion, fecha_modificacion) FROM stdin;
1	Presidente	222	2014-01-01	2014-06-01	1	1	IT	XXX	59	NO	2014-02-15 18:59:48.342714	\N
5	Limpiador	333	2014-01-01	2014-12-31	4	2	GOC	ZZZ	42	SI	2014-02-15 19:00:47.784606	\N
\.


--
-- TOC entry 2139 (class 0 OID 0)
-- Dependencies: 167
-- Name: carreras_adm_carrera_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('carreras_adm_carrera_seq', 5, true);


--
-- TOC entry 2108 (class 0 OID 18609)
-- Dependencies: 179
-- Data for Name: carreras_x_perfiles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY carreras_x_perfiles (carrera, perfil) FROM stdin;
1	1
\.


--
-- TOC entry 2109 (class 0 OID 18626)
-- Dependencies: 180
-- Data for Name: cursosC_x_perfiles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "cursosC_x_perfiles" ("cursoC", perfil, fecha_fin, lugar) FROM stdin;
1	1	2014-02-18	Narnia
1	2	2014-02-17	Narnia
\.


--
-- TOC entry 2101 (class 0 OID 18499)
-- Dependencies: 172
-- Data for Name: cursos_culminados; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cursos_culminados (cod_curso, titulo, contenido, fecha_inicio, fecha_fin, usuario, archivo, perfil, calificacion, lugar, fecha_creacion, fecha_modificacion) FROM stdin;
1	Natacion con Gremlims	Algo	2013-01-01	2013-06-01	1	1	1	10	NArnia	2014-02-15 19:18:51.407945	\N
\.


--
-- TOC entry 2102 (class 0 OID 18533)
-- Dependencies: 173
-- Data for Name: cursos_disponibles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cursos_disponibles (cod_curso, titulo, contenido, fecha_inicio, fecha_fin, lugar, fecha_creacion, fecha_modificacion, costo, requerimiento, tipo) FROM stdin;
1	Cocina 101	Cocinando niños	2014-01-01	2014-06-05	Eter	2014-02-15 19:13:20.392274	\N	150000	1	\N
2	Cocina Avanzada	Cocinando Pokemones	2016-07-01	2014-12-25	Mburivicharoga	2014-02-15 19:14:19.902588	\N	300000	2	\N
3	Baño de Gremlins	Muerte y destrucción	2014-02-16	2014-02-22	Mordor	\N	\N	300000	1	\N
\.


--
-- TOC entry 2140 (class 0 OID 0)
-- Dependencies: 174
-- Name: cursos_disponibles_cod_curso_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cursos_disponibles_cod_curso_seq', 3, true);


--
-- TOC entry 2117 (class 0 OID 18779)
-- Dependencies: 188
-- Data for Name: cursos_x_perfiles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cursos_x_perfiles (cod_curso, perfil, fecha_fin, lugar) FROM stdin;
\.


--
-- TOC entry 2141 (class 0 OID 0)
-- Dependencies: 171
-- Name: cusos_culminados_cod_curso_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cusos_culminados_cod_curso_seq', 1, true);


--
-- TOC entry 2116 (class 0 OID 18742)
-- Dependencies: 187
-- Data for Name: evaluacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY evaluacion (evaluacion, "nombreEva", fecha, puntuacion, perfil) FROM stdin;
\.


--
-- TOC entry 2142 (class 0 OID 0)
-- Dependencies: 186
-- Name: evaluacion_evaluacion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('evaluacion_evaluacion_seq', 1, false);


--
-- TOC entry 2111 (class 0 OID 18700)
-- Dependencies: 182
-- Data for Name: familiares_x_perfil; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY familiares_x_perfil (familiar, enlace_uno, nombre_paren, enlace_dos) FROM stdin;
\.


--
-- TOC entry 2143 (class 0 OID 0)
-- Dependencies: 181
-- Name: familiares_x_perfil_familiar_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('familiares_x_perfil_familiar_seq', 1, false);


--
-- TOC entry 2113 (class 0 OID 18718)
-- Dependencies: 184
-- Data for Name: idiomas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY idiomas (idioma, nombre) FROM stdin;
\.


--
-- TOC entry 2144 (class 0 OID 0)
-- Dependencies: 183
-- Name: idiomas_idioma_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('idiomas_idioma_seq', 1, false);


--
-- TOC entry 2114 (class 0 OID 18725)
-- Dependencies: 185
-- Data for Name: idiomas_x_perfil; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY idiomas_x_perfil (idioma, nombre, habla, lee, escribe, perfil) FROM stdin;
\.


--
-- TOC entry 2095 (class 0 OID 18428)
-- Dependencies: 166
-- Data for Name: perfiles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY perfiles (perfil, estado, nombre, documento, tipo_documento, nivel_academico, especialidad, documento_comprobante, direccion, telefono, dependencia, fecha_creacion, fecha_modificacion, cargo, estado_civil, edad, "estado_F", antiguedad, parentesco, fecha_de_nac, evaluacion, idioma) FROM stdin;
1	A	Perfil 1	doc	CI	Doctorado	IT	?	aaaa	3333	GOC	2014-02-15 18:51:50.222866	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2	A	Perdil2	doc2	PA	Secundario	Derecho	223	bbbb	5555	LEgal	2014-02-15 18:54:52.629264	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
\.


--
-- TOC entry 2145 (class 0 OID 0)
-- Dependencies: 165
-- Name: perfiles_perfil_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('perfiles_perfil_seq', 2, true);


--
-- TOC entry 2105 (class 0 OID 18560)
-- Dependencies: 176
-- Data for Name: requerimientos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY requerimientos (requerimiento, cargo, titulo, visa, antiguedad, pais, fecha_creacion, fecha_modificacion) FROM stdin;
1	Overlord	OL	S	2002-01-01	PY	2014-02-15 18:56:10.818333	\N
2	Slave	Sl.	N	2000-01-01	AR	2014-02-15 18:56:36.73949	\N
\.


--
-- TOC entry 2146 (class 0 OID 0)
-- Dependencies: 175
-- Name: requerimientos_requerimiento_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('requerimientos_requerimiento_seq', 2, true);


--
-- TOC entry 2106 (class 0 OID 18577)
-- Dependencies: 177
-- Data for Name: requerimientos_x_cursos_disponibles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY requerimientos_x_cursos_disponibles (requerimiento, "cursoD", titulo) FROM stdin;
1	2	Superman
\.


--
-- TOC entry 2091 (class 0 OID 18391)
-- Dependencies: 162
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY users (usuario, administrador, "user", password, nombre, estado, email, perfil, fecha_creacion, fecha_modificacion) FROM stdin;
1	1	melizeche	12345	Marce	A	melizeche@gmail.com	1	2014-02-15 18:52:54.091043	\N
4	1	gaulth	123445	Gaulth	A	gg@g.com	1	2014-02-15 18:53:47.371368	\N
\.


--
-- TOC entry 2147 (class 0 OID 0)
-- Dependencies: 161
-- Name: users_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('users_usuario_seq', 4, true);


--
-- TOC entry 1935 (class 2606 OID 18417)
-- Name: administradores_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY administradores
    ADD CONSTRAINT administradores_pkey PRIMARY KEY (administrador);


--
-- TOC entry 1951 (class 2606 OID 18598)
-- Name: archivo_x_perfiles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY archivo_x_perfiles
    ADD CONSTRAINT archivo_x_perfiles_pkey PRIMARY KEY (archivo, perfil);


--
-- TOC entry 1941 (class 2606 OID 18472)
-- Name: archivos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY archivos
    ADD CONSTRAINT archivos_pkey PRIMARY KEY (archivo);


--
-- TOC entry 1939 (class 2606 OID 18620)
-- Name: carreras_adm_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY carreras_adm
    ADD CONSTRAINT carreras_adm_pkey PRIMARY KEY (carrera) WITH (fillfactor=100);


--
-- TOC entry 1953 (class 2606 OID 18613)
-- Name: carreras_x_perfiles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY carreras_x_perfiles
    ADD CONSTRAINT carreras_x_perfiles_pkey PRIMARY KEY (carrera, perfil);


--
-- TOC entry 1955 (class 2606 OID 18630)
-- Name: cursosC_x_perfiles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "cursosC_x_perfiles"
    ADD CONSTRAINT "cursosC_x_perfiles_pkey" PRIMARY KEY ("cursoC", perfil);


--
-- TOC entry 1945 (class 2606 OID 18588)
-- Name: cursos_disponibles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cursos_disponibles
    ADD CONSTRAINT cursos_disponibles_pkey PRIMARY KEY (cod_curso) WITH (fillfactor=100);


--
-- TOC entry 1965 (class 2606 OID 18785)
-- Name: cursos_x_perfiles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cursos_x_perfiles
    ADD CONSTRAINT cursos_x_perfiles_pkey PRIMARY KEY (cod_curso, perfil) WITH (fillfactor=100);


--
-- TOC entry 1943 (class 2606 OID 18637)
-- Name: cusos_culminados_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cursos_culminados
    ADD CONSTRAINT cusos_culminados_pkey PRIMARY KEY (cod_curso) WITH (fillfactor=100);


--
-- TOC entry 1963 (class 2606 OID 18747)
-- Name: evaluacion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY evaluacion
    ADD CONSTRAINT evaluacion_pkey PRIMARY KEY (evaluacion);


--
-- TOC entry 1957 (class 2606 OID 18705)
-- Name: familiares_x_perfil_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY familiares_x_perfil
    ADD CONSTRAINT familiares_x_perfil_pkey PRIMARY KEY (familiar);


--
-- TOC entry 1959 (class 2606 OID 18723)
-- Name: idiomas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY idiomas
    ADD CONSTRAINT idiomas_pkey PRIMARY KEY (idioma);


--
-- TOC entry 1961 (class 2606 OID 18729)
-- Name: idiomas_x_perfil_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY idiomas_x_perfil
    ADD CONSTRAINT idiomas_x_perfil_pkey PRIMARY KEY (idioma);


--
-- TOC entry 1937 (class 2606 OID 18433)
-- Name: perfiles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY perfiles
    ADD CONSTRAINT perfiles_pkey PRIMARY KEY (perfil);


--
-- TOC entry 1947 (class 2606 OID 18565)
-- Name: requerimientos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY requerimientos
    ADD CONSTRAINT requerimientos_pkey PRIMARY KEY (requerimiento);


--
-- TOC entry 1949 (class 2606 OID 18581)
-- Name: requerimientos_x_cursos_disponibles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY requerimientos_x_cursos_disponibles
    ADD CONSTRAINT requerimientos_x_cursos_disponibles_pkey PRIMARY KEY (requerimiento, "cursoD");


--
-- TOC entry 1933 (class 2606 OID 18396)
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (usuario);


--
-- TOC entry 1975 (class 2606 OID 18589)
-- Name: Foreign_key01; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY requerimientos_x_cursos_disponibles
    ADD CONSTRAINT "Foreign_key01" FOREIGN KEY ("cursoD") REFERENCES cursos_disponibles(cod_curso);


--
-- TOC entry 1976 (class 2606 OID 18599)
-- Name: Foreign_key01; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY archivo_x_perfiles
    ADD CONSTRAINT "Foreign_key01" FOREIGN KEY (perfil) REFERENCES perfiles(perfil);


--
-- TOC entry 1978 (class 2606 OID 18614)
-- Name: Foreign_key01; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY carreras_x_perfiles
    ADD CONSTRAINT "Foreign_key01" FOREIGN KEY (perfil) REFERENCES perfiles(perfil);


--
-- TOC entry 1980 (class 2606 OID 18683)
-- Name: Foreign_key01; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "cursosC_x_perfiles"
    ADD CONSTRAINT "Foreign_key01" FOREIGN KEY (perfil) REFERENCES perfiles(perfil);


--
-- TOC entry 1968 (class 2606 OID 18693)
-- Name: Foreign_key01; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY perfiles
    ADD CONSTRAINT "Foreign_key01" FOREIGN KEY (cargo) REFERENCES carreras_adm(carrera);


--
-- TOC entry 1982 (class 2606 OID 18706)
-- Name: Foreign_key01; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY familiares_x_perfil
    ADD CONSTRAINT "Foreign_key01" FOREIGN KEY (enlace_uno) REFERENCES perfiles(perfil);


--
-- TOC entry 1984 (class 2606 OID 18730)
-- Name: Foreign_key01; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY idiomas_x_perfil
    ADD CONSTRAINT "Foreign_key01" FOREIGN KEY (idioma) REFERENCES idiomas(idioma);


--
-- TOC entry 1986 (class 2606 OID 18748)
-- Name: Foreign_key01; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY evaluacion
    ADD CONSTRAINT "Foreign_key01" FOREIGN KEY (perfil) REFERENCES perfiles(perfil);


--
-- TOC entry 1987 (class 2606 OID 18786)
-- Name: Foreign_key01; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cursos_x_perfiles
    ADD CONSTRAINT "Foreign_key01" FOREIGN KEY (perfil) REFERENCES perfiles(perfil);


--
-- TOC entry 1977 (class 2606 OID 18604)
-- Name: Foreign_key02; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY archivo_x_perfiles
    ADD CONSTRAINT "Foreign_key02" FOREIGN KEY (archivo) REFERENCES archivos(archivo);


--
-- TOC entry 1979 (class 2606 OID 18621)
-- Name: Foreign_key02; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY carreras_x_perfiles
    ADD CONSTRAINT "Foreign_key02" FOREIGN KEY (carrera) REFERENCES carreras_adm(carrera);


--
-- TOC entry 1981 (class 2606 OID 18688)
-- Name: Foreign_key02; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "cursosC_x_perfiles"
    ADD CONSTRAINT "Foreign_key02" FOREIGN KEY ("cursoC") REFERENCES cursos_culminados(cod_curso);


--
-- TOC entry 1983 (class 2606 OID 18711)
-- Name: Foreign_key02; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY familiares_x_perfil
    ADD CONSTRAINT "Foreign_key02" FOREIGN KEY (enlace_dos) REFERENCES perfiles(perfil);


--
-- TOC entry 1985 (class 2606 OID 18735)
-- Name: Foreign_key02; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY idiomas_x_perfil
    ADD CONSTRAINT "Foreign_key02" FOREIGN KEY (perfil) REFERENCES perfiles(perfil);


--
-- TOC entry 1988 (class 2606 OID 18791)
-- Name: Foreign_key02; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cursos_x_perfiles
    ADD CONSTRAINT "Foreign_key02" FOREIGN KEY (cod_curso) REFERENCES cursos_disponibles(cod_curso);


--
-- TOC entry 1967 (class 2606 OID 18439)
-- Name: fk_admin; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users
    ADD CONSTRAINT fk_admin FOREIGN KEY (administrador) REFERENCES administradores(administrador);


--
-- TOC entry 1970 (class 2606 OID 18490)
-- Name: fk_archivo; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY carreras_adm
    ADD CONSTRAINT fk_archivo FOREIGN KEY (archivo) REFERENCES archivos(archivo);


--
-- TOC entry 1971 (class 2606 OID 18657)
-- Name: fk_archivo; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cursos_culminados
    ADD CONSTRAINT fk_archivo FOREIGN KEY (archivo) REFERENCES archivos(archivo);


--
-- TOC entry 1966 (class 2606 OID 18434)
-- Name: fk_perfil; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users
    ADD CONSTRAINT fk_perfil FOREIGN KEY (perfil) REFERENCES perfiles(perfil);


--
-- TOC entry 1972 (class 2606 OID 18662)
-- Name: fk_perfil; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cursos_culminados
    ADD CONSTRAINT fk_perfil FOREIGN KEY (perfil) REFERENCES perfiles(perfil);


--
-- TOC entry 1974 (class 2606 OID 18582)
-- Name: fk_req; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY requerimientos_x_cursos_disponibles
    ADD CONSTRAINT fk_req FOREIGN KEY (requerimiento) REFERENCES requerimientos(requerimiento);


--
-- TOC entry 1969 (class 2606 OID 18485)
-- Name: fk_user; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY carreras_adm
    ADD CONSTRAINT fk_user FOREIGN KEY (usuario) REFERENCES users(usuario);


--
-- TOC entry 1973 (class 2606 OID 18667)
-- Name: fk_user; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cursos_culminados
    ADD CONSTRAINT fk_user FOREIGN KEY (usuario) REFERENCES users(usuario);


--
-- TOC entry 2124 (class 0 OID 0)
-- Dependencies: 5
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2014-02-18 00:35:25

--
-- PostgreSQL database dump complete
--

