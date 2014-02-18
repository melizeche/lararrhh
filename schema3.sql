--
-- PostgreSQL database dump
--

-- Dumped from database version 9.1.11
-- Dumped by pg_dump version 9.3.1
-- Started on 2014-02-18 00:37:38

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 189 (class 3079 OID 11719)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2097 (class 0 OID 0)
-- Dependencies: 189
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 164 (class 1259 OID 18411)
-- Name: administradores; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE administradores (
    administrador integer NOT NULL,
    estado character(1) NOT NULL,
    fecha_creacion timestamp without time zone DEFAULT now(),
    fecha_modificacion timestamp without time zone
);


--
-- TOC entry 163 (class 1259 OID 18409)
-- Name: administradores_administrador_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE administradores_administrador_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2098 (class 0 OID 0)
-- Dependencies: 163
-- Name: administradores_administrador_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE administradores_administrador_seq OWNED BY administradores.administrador;


--
-- TOC entry 178 (class 1259 OID 18594)
-- Name: archivo_x_perfiles; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE archivo_x_perfiles (
    archivo integer NOT NULL,
    perfil integer NOT NULL,
    adjunto character varying(255)
);


--
-- TOC entry 170 (class 1259 OID 18467)
-- Name: archivos; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE archivos (
    archivo integer NOT NULL,
    tipo_doc character varying(30),
    adjunto character varying(255),
    fecha_creacion timestamp without time zone DEFAULT now(),
    fecha_modificacion timestamp without time zone
);


--
-- TOC entry 169 (class 1259 OID 18465)
-- Name: archivos_archivo_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE archivos_archivo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2099 (class 0 OID 0)
-- Dependencies: 169
-- Name: archivos_archivo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE archivos_archivo_seq OWNED BY archivos.archivo;


--
-- TOC entry 168 (class 1259 OID 18459)
-- Name: carreras_adm; Type: TABLE; Schema: public; Owner: -; Tablespace: 
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


--
-- TOC entry 167 (class 1259 OID 18457)
-- Name: carreras_adm_carrera_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE carreras_adm_carrera_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2100 (class 0 OID 0)
-- Dependencies: 167
-- Name: carreras_adm_carrera_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE carreras_adm_carrera_seq OWNED BY carreras_adm.carrera;


--
-- TOC entry 179 (class 1259 OID 18609)
-- Name: carreras_x_perfiles; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE carreras_x_perfiles (
    carrera integer NOT NULL,
    perfil integer NOT NULL
);


--
-- TOC entry 180 (class 1259 OID 18626)
-- Name: cursosC_x_perfiles; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE "cursosC_x_perfiles" (
    "cursoC" integer NOT NULL,
    perfil integer NOT NULL,
    fecha_fin date,
    lugar character varying(30)
);


--
-- TOC entry 172 (class 1259 OID 18499)
-- Name: cursos_culminados; Type: TABLE; Schema: public; Owner: -; Tablespace: 
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


--
-- TOC entry 173 (class 1259 OID 18533)
-- Name: cursos_disponibles; Type: TABLE; Schema: public; Owner: -; Tablespace: 
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


--
-- TOC entry 174 (class 1259 OID 18536)
-- Name: cursos_disponibles_cod_curso_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE cursos_disponibles_cod_curso_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2101 (class 0 OID 0)
-- Dependencies: 174
-- Name: cursos_disponibles_cod_curso_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE cursos_disponibles_cod_curso_seq OWNED BY cursos_disponibles.cod_curso;


--
-- TOC entry 188 (class 1259 OID 18779)
-- Name: cursos_x_perfiles; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE cursos_x_perfiles (
    cod_curso integer NOT NULL,
    perfil integer NOT NULL,
    fecha_fin date,
    lugar character varying(30)
);


--
-- TOC entry 171 (class 1259 OID 18497)
-- Name: cusos_culminados_cod_curso_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE cusos_culminados_cod_curso_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2102 (class 0 OID 0)
-- Dependencies: 171
-- Name: cusos_culminados_cod_curso_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE cusos_culminados_cod_curso_seq OWNED BY cursos_culminados.cod_curso;


--
-- TOC entry 187 (class 1259 OID 18742)
-- Name: evaluacion; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE evaluacion (
    evaluacion integer NOT NULL,
    "nombreEva" character varying(255),
    fecha date,
    puntuacion real,
    perfil integer
);


--
-- TOC entry 186 (class 1259 OID 18740)
-- Name: evaluacion_evaluacion_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE evaluacion_evaluacion_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2103 (class 0 OID 0)
-- Dependencies: 186
-- Name: evaluacion_evaluacion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE evaluacion_evaluacion_seq OWNED BY evaluacion.evaluacion;


--
-- TOC entry 182 (class 1259 OID 18700)
-- Name: familiares_x_perfil; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE familiares_x_perfil (
    familiar integer NOT NULL,
    enlace_uno integer,
    nombre_paren character varying(255),
    enlace_dos integer
);


--
-- TOC entry 181 (class 1259 OID 18698)
-- Name: familiares_x_perfil_familiar_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE familiares_x_perfil_familiar_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2104 (class 0 OID 0)
-- Dependencies: 181
-- Name: familiares_x_perfil_familiar_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE familiares_x_perfil_familiar_seq OWNED BY familiares_x_perfil.familiar;


--
-- TOC entry 184 (class 1259 OID 18718)
-- Name: idiomas; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE idiomas (
    idioma integer NOT NULL,
    nombre character varying(255)
);


--
-- TOC entry 183 (class 1259 OID 18716)
-- Name: idiomas_idioma_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE idiomas_idioma_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2105 (class 0 OID 0)
-- Dependencies: 183
-- Name: idiomas_idioma_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE idiomas_idioma_seq OWNED BY idiomas.idioma;


--
-- TOC entry 185 (class 1259 OID 18725)
-- Name: idiomas_x_perfil; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE idiomas_x_perfil (
    idioma integer NOT NULL,
    nombre character varying(255),
    habla character varying(2),
    lee character varying(2),
    escribe character varying(2),
    perfil integer
);


--
-- TOC entry 166 (class 1259 OID 18428)
-- Name: perfiles; Type: TABLE; Schema: public; Owner: -; Tablespace: 
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


--
-- TOC entry 165 (class 1259 OID 18426)
-- Name: perfiles_perfil_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE perfiles_perfil_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2106 (class 0 OID 0)
-- Dependencies: 165
-- Name: perfiles_perfil_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE perfiles_perfil_seq OWNED BY perfiles.perfil;


--
-- TOC entry 176 (class 1259 OID 18560)
-- Name: requerimientos; Type: TABLE; Schema: public; Owner: -; Tablespace: 
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


--
-- TOC entry 175 (class 1259 OID 18558)
-- Name: requerimientos_requerimiento_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE requerimientos_requerimiento_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2107 (class 0 OID 0)
-- Dependencies: 175
-- Name: requerimientos_requerimiento_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE requerimientos_requerimiento_seq OWNED BY requerimientos.requerimiento;


--
-- TOC entry 177 (class 1259 OID 18577)
-- Name: requerimientos_x_cursos_disponibles; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE requerimientos_x_cursos_disponibles (
    requerimiento integer NOT NULL,
    "cursoD" integer NOT NULL,
    titulo character varying(30)
);


--
-- TOC entry 162 (class 1259 OID 18391)
-- Name: users; Type: TABLE; Schema: public; Owner: -; Tablespace: 
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


--
-- TOC entry 161 (class 1259 OID 18389)
-- Name: users_usuario_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE users_usuario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2108 (class 0 OID 0)
-- Dependencies: 161
-- Name: users_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE users_usuario_seq OWNED BY users.usuario;


--
-- TOC entry 1915 (class 2604 OID 18414)
-- Name: administrador; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY administradores ALTER COLUMN administrador SET DEFAULT nextval('administradores_administrador_seq'::regclass);


--
-- TOC entry 1921 (class 2604 OID 18470)
-- Name: archivo; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY archivos ALTER COLUMN archivo SET DEFAULT nextval('archivos_archivo_seq'::regclass);


--
-- TOC entry 1919 (class 2604 OID 18462)
-- Name: carrera; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY carreras_adm ALTER COLUMN carrera SET DEFAULT nextval('carreras_adm_carrera_seq'::regclass);


--
-- TOC entry 1923 (class 2604 OID 18502)
-- Name: cod_curso; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY cursos_culminados ALTER COLUMN cod_curso SET DEFAULT nextval('cusos_culminados_cod_curso_seq'::regclass);


--
-- TOC entry 1925 (class 2604 OID 18538)
-- Name: cod_curso; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY cursos_disponibles ALTER COLUMN cod_curso SET DEFAULT nextval('cursos_disponibles_cod_curso_seq'::regclass);


--
-- TOC entry 1931 (class 2604 OID 18745)
-- Name: evaluacion; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY evaluacion ALTER COLUMN evaluacion SET DEFAULT nextval('evaluacion_evaluacion_seq'::regclass);


--
-- TOC entry 1929 (class 2604 OID 18703)
-- Name: familiar; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY familiares_x_perfil ALTER COLUMN familiar SET DEFAULT nextval('familiares_x_perfil_familiar_seq'::regclass);


--
-- TOC entry 1930 (class 2604 OID 18721)
-- Name: idioma; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY idiomas ALTER COLUMN idioma SET DEFAULT nextval('idiomas_idioma_seq'::regclass);


--
-- TOC entry 1917 (class 2604 OID 18431)
-- Name: perfil; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY perfiles ALTER COLUMN perfil SET DEFAULT nextval('perfiles_perfil_seq'::regclass);


--
-- TOC entry 1927 (class 2604 OID 18563)
-- Name: requerimiento; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY requerimientos ALTER COLUMN requerimiento SET DEFAULT nextval('requerimientos_requerimiento_seq'::regclass);


--
-- TOC entry 1913 (class 2604 OID 18394)
-- Name: usuario; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY users ALTER COLUMN usuario SET DEFAULT nextval('users_usuario_seq'::regclass);


--
-- TOC entry 1935 (class 2606 OID 18417)
-- Name: administradores_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY administradores
    ADD CONSTRAINT administradores_pkey PRIMARY KEY (administrador);


--
-- TOC entry 1951 (class 2606 OID 18598)
-- Name: archivo_x_perfiles_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY archivo_x_perfiles
    ADD CONSTRAINT archivo_x_perfiles_pkey PRIMARY KEY (archivo, perfil);


--
-- TOC entry 1941 (class 2606 OID 18472)
-- Name: archivos_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY archivos
    ADD CONSTRAINT archivos_pkey PRIMARY KEY (archivo);


--
-- TOC entry 1939 (class 2606 OID 18620)
-- Name: carreras_adm_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY carreras_adm
    ADD CONSTRAINT carreras_adm_pkey PRIMARY KEY (carrera) WITH (fillfactor=100);


--
-- TOC entry 1953 (class 2606 OID 18613)
-- Name: carreras_x_perfiles_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY carreras_x_perfiles
    ADD CONSTRAINT carreras_x_perfiles_pkey PRIMARY KEY (carrera, perfil);


--
-- TOC entry 1955 (class 2606 OID 18630)
-- Name: cursosC_x_perfiles_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY "cursosC_x_perfiles"
    ADD CONSTRAINT "cursosC_x_perfiles_pkey" PRIMARY KEY ("cursoC", perfil);


--
-- TOC entry 1945 (class 2606 OID 18588)
-- Name: cursos_disponibles_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cursos_disponibles
    ADD CONSTRAINT cursos_disponibles_pkey PRIMARY KEY (cod_curso) WITH (fillfactor=100);


--
-- TOC entry 1965 (class 2606 OID 18785)
-- Name: cursos_x_perfiles_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cursos_x_perfiles
    ADD CONSTRAINT cursos_x_perfiles_pkey PRIMARY KEY (cod_curso, perfil) WITH (fillfactor=100);


--
-- TOC entry 1943 (class 2606 OID 18637)
-- Name: cusos_culminados_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cursos_culminados
    ADD CONSTRAINT cusos_culminados_pkey PRIMARY KEY (cod_curso) WITH (fillfactor=100);


--
-- TOC entry 1963 (class 2606 OID 18747)
-- Name: evaluacion_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY evaluacion
    ADD CONSTRAINT evaluacion_pkey PRIMARY KEY (evaluacion);


--
-- TOC entry 1957 (class 2606 OID 18705)
-- Name: familiares_x_perfil_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY familiares_x_perfil
    ADD CONSTRAINT familiares_x_perfil_pkey PRIMARY KEY (familiar);


--
-- TOC entry 1959 (class 2606 OID 18723)
-- Name: idiomas_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY idiomas
    ADD CONSTRAINT idiomas_pkey PRIMARY KEY (idioma);


--
-- TOC entry 1961 (class 2606 OID 18729)
-- Name: idiomas_x_perfil_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY idiomas_x_perfil
    ADD CONSTRAINT idiomas_x_perfil_pkey PRIMARY KEY (idioma);


--
-- TOC entry 1937 (class 2606 OID 18433)
-- Name: perfiles_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY perfiles
    ADD CONSTRAINT perfiles_pkey PRIMARY KEY (perfil);


--
-- TOC entry 1947 (class 2606 OID 18565)
-- Name: requerimientos_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY requerimientos
    ADD CONSTRAINT requerimientos_pkey PRIMARY KEY (requerimiento);


--
-- TOC entry 1949 (class 2606 OID 18581)
-- Name: requerimientos_x_cursos_disponibles_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY requerimientos_x_cursos_disponibles
    ADD CONSTRAINT requerimientos_x_cursos_disponibles_pkey PRIMARY KEY (requerimiento, "cursoD");


--
-- TOC entry 1933 (class 2606 OID 18396)
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (usuario);


--
-- TOC entry 1975 (class 2606 OID 18589)
-- Name: Foreign_key01; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY requerimientos_x_cursos_disponibles
    ADD CONSTRAINT "Foreign_key01" FOREIGN KEY ("cursoD") REFERENCES cursos_disponibles(cod_curso);


--
-- TOC entry 1976 (class 2606 OID 18599)
-- Name: Foreign_key01; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY archivo_x_perfiles
    ADD CONSTRAINT "Foreign_key01" FOREIGN KEY (perfil) REFERENCES perfiles(perfil);


--
-- TOC entry 1978 (class 2606 OID 18614)
-- Name: Foreign_key01; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY carreras_x_perfiles
    ADD CONSTRAINT "Foreign_key01" FOREIGN KEY (perfil) REFERENCES perfiles(perfil);


--
-- TOC entry 1980 (class 2606 OID 18683)
-- Name: Foreign_key01; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY "cursosC_x_perfiles"
    ADD CONSTRAINT "Foreign_key01" FOREIGN KEY (perfil) REFERENCES perfiles(perfil);


--
-- TOC entry 1968 (class 2606 OID 18693)
-- Name: Foreign_key01; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY perfiles
    ADD CONSTRAINT "Foreign_key01" FOREIGN KEY (cargo) REFERENCES carreras_adm(carrera);


--
-- TOC entry 1982 (class 2606 OID 18706)
-- Name: Foreign_key01; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY familiares_x_perfil
    ADD CONSTRAINT "Foreign_key01" FOREIGN KEY (enlace_uno) REFERENCES perfiles(perfil);


--
-- TOC entry 1984 (class 2606 OID 18730)
-- Name: Foreign_key01; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY idiomas_x_perfil
    ADD CONSTRAINT "Foreign_key01" FOREIGN KEY (idioma) REFERENCES idiomas(idioma);


--
-- TOC entry 1986 (class 2606 OID 18748)
-- Name: Foreign_key01; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY evaluacion
    ADD CONSTRAINT "Foreign_key01" FOREIGN KEY (perfil) REFERENCES perfiles(perfil);


--
-- TOC entry 1987 (class 2606 OID 18786)
-- Name: Foreign_key01; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY cursos_x_perfiles
    ADD CONSTRAINT "Foreign_key01" FOREIGN KEY (perfil) REFERENCES perfiles(perfil);


--
-- TOC entry 1977 (class 2606 OID 18604)
-- Name: Foreign_key02; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY archivo_x_perfiles
    ADD CONSTRAINT "Foreign_key02" FOREIGN KEY (archivo) REFERENCES archivos(archivo);


--
-- TOC entry 1979 (class 2606 OID 18621)
-- Name: Foreign_key02; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY carreras_x_perfiles
    ADD CONSTRAINT "Foreign_key02" FOREIGN KEY (carrera) REFERENCES carreras_adm(carrera);


--
-- TOC entry 1981 (class 2606 OID 18688)
-- Name: Foreign_key02; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY "cursosC_x_perfiles"
    ADD CONSTRAINT "Foreign_key02" FOREIGN KEY ("cursoC") REFERENCES cursos_culminados(cod_curso);


--
-- TOC entry 1983 (class 2606 OID 18711)
-- Name: Foreign_key02; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY familiares_x_perfil
    ADD CONSTRAINT "Foreign_key02" FOREIGN KEY (enlace_dos) REFERENCES perfiles(perfil);


--
-- TOC entry 1985 (class 2606 OID 18735)
-- Name: Foreign_key02; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY idiomas_x_perfil
    ADD CONSTRAINT "Foreign_key02" FOREIGN KEY (perfil) REFERENCES perfiles(perfil);


--
-- TOC entry 1988 (class 2606 OID 18791)
-- Name: Foreign_key02; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY cursos_x_perfiles
    ADD CONSTRAINT "Foreign_key02" FOREIGN KEY (cod_curso) REFERENCES cursos_disponibles(cod_curso);


--
-- TOC entry 1967 (class 2606 OID 18439)
-- Name: fk_admin; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY users
    ADD CONSTRAINT fk_admin FOREIGN KEY (administrador) REFERENCES administradores(administrador);


--
-- TOC entry 1970 (class 2606 OID 18490)
-- Name: fk_archivo; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY carreras_adm
    ADD CONSTRAINT fk_archivo FOREIGN KEY (archivo) REFERENCES archivos(archivo);


--
-- TOC entry 1971 (class 2606 OID 18657)
-- Name: fk_archivo; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY cursos_culminados
    ADD CONSTRAINT fk_archivo FOREIGN KEY (archivo) REFERENCES archivos(archivo);


--
-- TOC entry 1966 (class 2606 OID 18434)
-- Name: fk_perfil; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY users
    ADD CONSTRAINT fk_perfil FOREIGN KEY (perfil) REFERENCES perfiles(perfil);


--
-- TOC entry 1972 (class 2606 OID 18662)
-- Name: fk_perfil; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY cursos_culminados
    ADD CONSTRAINT fk_perfil FOREIGN KEY (perfil) REFERENCES perfiles(perfil);


--
-- TOC entry 1974 (class 2606 OID 18582)
-- Name: fk_req; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY requerimientos_x_cursos_disponibles
    ADD CONSTRAINT fk_req FOREIGN KEY (requerimiento) REFERENCES requerimientos(requerimiento);


--
-- TOC entry 1969 (class 2606 OID 18485)
-- Name: fk_user; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY carreras_adm
    ADD CONSTRAINT fk_user FOREIGN KEY (usuario) REFERENCES users(usuario);


--
-- TOC entry 1973 (class 2606 OID 18667)
-- Name: fk_user; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY cursos_culminados
    ADD CONSTRAINT fk_user FOREIGN KEY (usuario) REFERENCES users(usuario);


--
-- TOC entry 2096 (class 0 OID 0)
-- Dependencies: 5
-- Name: public; Type: ACL; Schema: -; Owner: -
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2014-02-18 00:37:38

--
-- PostgreSQL database dump complete
--

