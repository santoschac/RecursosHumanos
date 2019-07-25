--
-- ER/Studio 8.0 SQL Code Generation
-- Company :      lenovo
-- Project :      BDRecursosH.DM1
-- Author :       Lenovo
--
-- Date Created : Thursday, July 25, 2019 09:40:00
-- Target DBMS : MySQL 5.x
--

-- 
-- TABLE: Accidentes 
--

CREATE TABLE Accidentes(
    IdAccidentes    INT             AUTO_INCREMENT,
    Descripcion     VARCHAR(300),
    Fecha           DATETIME,
    Reporta         VARCHAR(100),
    Accidentes      VARCHAR(30),
    IdPersonal      INT             NOT NULL,
    PRIMARY KEY (IdAccidentes)
);



-- 
-- TABLE: AsignarJornada 
--

CREATE TABLE AsignarJornada(
    IdAsignarJornada    INT         AUTO_INCREMENT,
    IdPersonal          INT         NOT NULL,
    IdJornada           INT         NOT NULL,
    FechaInicio         DATETIME,
    FechaFinal          DATETIME,
    PRIMARY KEY (IdAsignarJornada)
);



-- 
-- TABLE: Bonos 
--

CREATE TABLE Bonos(
    IdBono         INT             AUTO_INCREMENT,
    Descripcion    VARCHAR(200),
    Fecha          DATETIME,
    Monto          VARCHAR(15),
    IdPersonal     INT             NOT NULL,
    PRIMARY KEY (IdBono)
);



-- 
-- TABLE: Cambios 
--

CREATE TABLE Cambios(
    IdCambio       INT             AUTO_INCREMENT,
    FechaInicio    DATETIME,
    IdPersonal     INT             NOT NULL,
    IdSucursal     INT             NOT NULL,
    IdPuesto       INT             NOT NULL,
    Descripcion    VARCHAR(230),
    PRIMARY KEY (IdCambio)
);



-- 
-- TABLE: Capacitacion 
--

CREATE TABLE Capacitacion(
    IdCapacitacion       INT             AUTO_INCREMENT,
    Evaluacion           VARCHAR(100),
    FechaCapacitacion    DATETIME,
    IdPersonal           INT             NOT NULL,
    IdCurso              INT             NOT NULL,
    PRIMARY KEY (IdCapacitacion)
);


-- 
-- TABLE: Comision 
--

CREATE TABLE Comision(
    IdComision              INT               AUTO_INCREMENT,
    Porcentaje              DECIMAL(10, 0),
    MontoCobrado            DECIMAL(10, 0),
    MontoComision           DECIMAL(10, 0),
    Fecha                   DATETIME,
    IdComisionPorcentaje    INT               NOT NULL,
    PRIMARY KEY (IdComision)
);



-- 
-- TABLE: ComisionPorcentaje 
--

CREATE TABLE ComisionPorcentaje(
    IdComisionPorcentaje    INT               AUTO_INCREMENT,
    Porcentaje              DECIMAL(18, 0),
    IdPersonal              INT               NOT NULL,
    PRIMARY KEY (IdComisionPorcentaje)
);



-- 
-- TABLE: Cursos 
--

CREATE TABLE Cursos(
    IdCurso             INT             AUTO_INCREMENT,
    Nombre              VARCHAR(35),
    DescripcionCurso    VARCHAR(200),
    Tipo                VARCHAR(30),
    Fecha               DATETIME,
    PRIMARY KEY (IdCurso)
);



-- 
-- TABLE: Empresa 
--

CREATE TABLE Empresa(
    IdEmpresa        INT            AUTO_INCREMENT,
    NombreEmpresa    VARCHAR(30),
    ClaveEmpresa     VARCHAR(10),
    PRIMARY KEY (IdEmpresa)
);



-- 
-- TABLE: Estado 
--

CREATE TABLE Estado(
    IdEstado        INT            AUTO_INCREMENT,
    NombreEstado    VARCHAR(40),
    IDPais          INT            NOT NULL,
    PRIMARY KEY (IdEstado)
);



-- 
-- TABLE: Faltas 
--

CREATE TABLE Faltas(
    IdFalta       INT         AUTO_INCREMENT,
    Fecha         DATETIME,
    IdPersonal    INT         NOT NULL,
    PRIMARY KEY (IdFalta)
);



-- 
-- TABLE: Incapacidad 
--

CREATE TABLE Incapacidad(
    IdIncapacidad    INT            AUTO_INCREMENT,
    DiaInicio        DATETIME,
    DiaFinal         DATETIME,
    Descripcion      CHAR(10),
    Documento        VARCHAR(70),
    IdPersonal       INT            NOT NULL,
    PRIMARY KEY (IdIncapacidad)
);



-- 
-- TABLE: Jornada 
--

CREATE TABLE Jornada(
    IdJornada      INT            AUTO_INCREMENT,
    FechaInicio    VARCHAR(30),
    FechaFin       VARCHAR(30),
    HoraInicio     TIME,
    HoraFin        TIME,
    PRIMARY KEY (IdJornada)
);


-- 
-- TABLE: Pais 
--

CREATE TABLE Pais(
    IDPais        INT            AUTO_INCREMENT,
    NombrePais    VARCHAR(40),
    PRIMARY KEY (IDPais)
);



-- 
-- TABLE: Permisos 
--

CREATE TABLE Permisos(
    IdPermiso      INT             AUTO_INCREMENT,
    Dia            DATETIME,
    Descripcion    VARCHAR(150),
    Devolucion     VARCHAR(100),
    IdPersonal     INT             NOT NULL,
    PRIMARY KEY (IdPermiso)
);



-- 
-- TABLE: PermisosHora 
--

CREATE TABLE PermisosHora(
    IdPermisoHora    INT             AUTO_INCREMENT,
    Fecha            DATETIME,
    HoraInicio       TIME,
    HoraFin          TIME,
    Motivo           VARCHAR(200),
    IdPersonal       INT             NOT NULL,
    PRIMARY KEY (IdPermisoHora)
);



-- 
-- TABLE: Personal 
--

CREATE TABLE Personal(
    IdPersonal            INT               AUTO_INCREMENT,
    Nombre                VARCHAR(50),
    ApellidoPaterno       VARCHAR(60),
    ApellidoMaterno       VARCHAR(60),
    Curp                  VARCHAR(20),
    Tipo                  VARCHAR(60),
    Direccion             VARCHAR(200),
    Colonia               VARCHAR(150),
    Delegacion            VARCHAR(150),
    CodigoPostal          INT,
    Rfc                   VARCHAR(200),
    Imss                  VARCHAR(70),
    FechaNacimiento       DATE,
    NivelAcademico        VARCHAR(70),
    Sexo                  VARCHAR(15),
    EstadoCivil           VARCHAR(50),
    Hijos                 VARCHAR(10),
    Padre                 VARCHAR(90),
    Madre                 VARCHAR(90),
    Departamento          VARCHAR(60),
    SueldoDiario          DECIMAL(10, 0),
    SueldoAnterior        DECIMAL(10, 0),
    SueldoActual          DECIMAL(10, 0),
    FechaBaja             DATETIME,
    ConceptoBaja          VARCHAR(70),
    FechaAlta             DATETIME,
    FechaAntiguedad       DATETIME,
    UltimaModificacion    DATETIME,
    TipoContrato          VARCHAR(70),
    Telefono              VARCHAR(15),
    IdPuesto              INT               NOT NULL,
    IdUsuario             INT               NOT NULL,
    IdSucursal            INT               NOT NULL,
    IdPoblacion           INT               NOT NULL,
    PRIMARY KEY (IdPersonal)
);



-- 
-- TABLE: Poblacion 
--

CREATE TABLE Poblacion(
    IdPoblacion        INT            AUTO_INCREMENT,
    NombrePoblacion    VARCHAR(40),
    IdEstado           INT            NOT NULL,
    PRIMARY KEY (IdPoblacion)
);



-- 
-- TABLE: Puestos 
--

CREATE TABLE Puestos(
    IdPuesto        INT            AUTO_INCREMENT,
    NombrePuesto    VARCHAR(70),
    PRIMARY KEY (IdPuesto)
);



-- 
-- TABLE: Solicitudes 
--

CREATE TABLE Solicitudes(
    IdSolicitudes     INT             AUTO_INCREMENT,
    Solicitud         CHAR(40),
    Descripcion       VARCHAR(300),
    FechaSolicitud    DATETIME,
    FechaAtencion     DATETIME,
    Atendido          VARCHAR(100),
    VigenteImms       VARCHAR(10),
    Estatus           VARCHAR(15),
    Documento         VARCHAR(70),
    IdPersonal        INT             NOT NULL,
    PRIMARY KEY (IdSolicitudes)
);



-- 
-- TABLE: Sucursal 
--

CREATE TABLE Sucursal(
    IdSucursal        INT            AUTO_INCREMENT,
    NombreSucursal    VARCHAR(30),
    Region            VARCHAR(40),
    IdEmpresa         INT            NOT NULL,
    IdPoblacion       INT            NOT NULL,
    PRIMARY KEY (IdSucursal)
);


-- 
-- TABLE: TipoUsuario 
--

CREATE TABLE TipoUsuario(
    IdTipoUsuario    INT            AUTO_INCREMENT,
    NombreTipo       VARCHAR(30),
    PRIMARY KEY (IdTipoUsuario)
);



-- 
-- TABLE: Usuario 
--

CREATE TABLE Usuario(
    IdUsuario        INT             AUTO_INCREMENT,
    Usuario          VARCHAR(70),
    Contrasena       VARCHAR(100),
    IdTipoUsuario    INT             NOT NULL,
    PRIMARY KEY (IdUsuario)
);



-- 
-- TABLE: Vacaciones 
--

CREATE TABLE Vacaciones(
    IdVacaciones    INT             AUTO_INCREMENT,
    Titulo          VARCHAR(100),
    Color           VARCHAR(10),
    FechaInicio     DATETIME,
    FechaFinal      DATETIME,
    IdPersonal      INT             NOT NULL,
    PRIMARY KEY (IdVacaciones)
);



-- 
-- TABLE: Viajes 
--

CREATE TABLE Viajes(
    IdViaje        INT             AUTO_INCREMENT,
    FechaInicio    DATE,
    FechaFin       DATE,
    Motivo         VARCHAR(200),
    IdPersonal     INT             NOT NULL,
    PRIMARY KEY (IdViaje)
);



-- 
-- TABLE: Viaticos 
--

CREATE TABLE Viaticos(
    IdViatico        INT               AUTO_INCREMENT,
    Motivo           VARCHAR(200),
    Monto            DECIMAL(10, 0),
    Comprobado       VARCHAR(30),
    Cantidad         DECIMAL(10, 0),
    Fecha            DATE,
    FechaAprobado    DATE,
    IdPoblacion      INT               NOT NULL,
    IdPersonal       INT               NOT NULL,
    PRIMARY KEY (IdViatico)
);



-- 
-- TABLE: Accidentes 
--

ALTER TABLE Accidentes ADD CONSTRAINT RefPersonal1 
    FOREIGN KEY (IdPersonal)
    REFERENCES Personal(IdPersonal)
;


-- 
-- TABLE: AsignarJornada 
--

ALTER TABLE AsignarJornada ADD CONSTRAINT RefPersonal17 
    FOREIGN KEY (IdPersonal)
    REFERENCES Personal(IdPersonal)
;

ALTER TABLE AsignarJornada ADD CONSTRAINT RefJornada18 
    FOREIGN KEY (IdJornada)
    REFERENCES Jornada(IdJornada)
;


-- 
-- TABLE: Bonos 
--

ALTER TABLE Bonos ADD CONSTRAINT RefPersonal24 
    FOREIGN KEY (IdPersonal)
    REFERENCES Personal(IdPersonal)
;


-- 
-- TABLE: Cambios 
--

ALTER TABLE Cambios ADD CONSTRAINT RefPersonal3 
    FOREIGN KEY (IdPersonal)
    REFERENCES Personal(IdPersonal)
;

ALTER TABLE Cambios ADD CONSTRAINT RefSucursal21 
    FOREIGN KEY (IdSucursal)
    REFERENCES Sucursal(IdSucursal)
;

ALTER TABLE Cambios ADD CONSTRAINT RefPuestos22 
    FOREIGN KEY (IdPuesto)
    REFERENCES Puestos(IdPuesto)
;


-- 
-- TABLE: Capacitacion 
--

ALTER TABLE Capacitacion ADD CONSTRAINT RefPersonal4 
    FOREIGN KEY (IdPersonal)
    REFERENCES Personal(IdPersonal)
;

ALTER TABLE Capacitacion ADD CONSTRAINT RefCursos10 
    FOREIGN KEY (IdCurso)
    REFERENCES Cursos(IdCurso)
;


-- 
-- TABLE: Comision 
--

ALTER TABLE Comision ADD CONSTRAINT RefComisionPorcentaje31 
    FOREIGN KEY (IdComisionPorcentaje)
    REFERENCES ComisionPorcentaje(IdComisionPorcentaje)
;


-- 
-- TABLE: ComisionPorcentaje 
--

ALTER TABLE ComisionPorcentaje ADD CONSTRAINT RefPersonal30 
    FOREIGN KEY (IdPersonal)
    REFERENCES Personal(IdPersonal)
;


-- 
-- TABLE: Estado 
--

ALTER TABLE Estado ADD CONSTRAINT RefPais8 
    FOREIGN KEY (IDPais)
    REFERENCES Pais(IDPais)
;


-- 
-- TABLE: Faltas 
--

ALTER TABLE Faltas ADD CONSTRAINT RefPersonal26 
    FOREIGN KEY (IdPersonal)
    REFERENCES Personal(IdPersonal)
;


-- 
-- TABLE: Incapacidad 
--

ALTER TABLE Incapacidad ADD CONSTRAINT RefPersonal23 
    FOREIGN KEY (IdPersonal)
    REFERENCES Personal(IdPersonal)
;


-- 
-- TABLE: Permisos 
--

ALTER TABLE Permisos ADD CONSTRAINT RefPersonal25 
    FOREIGN KEY (IdPersonal)
    REFERENCES Personal(IdPersonal)
;


-- 
-- TABLE: PermisosHora 
--

ALTER TABLE PermisosHora ADD CONSTRAINT RefPersonal27 
    FOREIGN KEY (IdPersonal)
    REFERENCES Personal(IdPersonal)
;


-- 
-- TABLE: Personal 
--

ALTER TABLE Personal ADD CONSTRAINT RefPuestos7 
    FOREIGN KEY (IdPuesto)
    REFERENCES Puestos(IdPuesto)
;

ALTER TABLE Personal ADD CONSTRAINT RefUsuario11 
    FOREIGN KEY (IdUsuario)
    REFERENCES Usuario(IdUsuario)
;

ALTER TABLE Personal ADD CONSTRAINT RefSucursal15 
    FOREIGN KEY (IdSucursal)
    REFERENCES Sucursal(IdSucursal)
;

ALTER TABLE Personal ADD CONSTRAINT RefPoblacion16 
    FOREIGN KEY (IdPoblacion)
    REFERENCES Poblacion(IdPoblacion)
;


-- 
-- TABLE: Poblacion 
--

ALTER TABLE Poblacion ADD CONSTRAINT RefEstado9 
    FOREIGN KEY (IdEstado)
    REFERENCES Estado(IdEstado)
;


-- 
-- TABLE: Solicitudes 
--

ALTER TABLE Solicitudes ADD CONSTRAINT RefPersonal2 
    FOREIGN KEY (IdPersonal)
    REFERENCES Personal(IdPersonal)
;


-- 
-- TABLE: Sucursal 
--

ALTER TABLE Sucursal ADD CONSTRAINT RefEmpresa12 
    FOREIGN KEY (IdEmpresa)
    REFERENCES Empresa(IdEmpresa)
;

ALTER TABLE Sucursal ADD CONSTRAINT RefPoblacion13 
    FOREIGN KEY (IdPoblacion)
    REFERENCES Poblacion(IdPoblacion)
;


-- 
-- TABLE: Usuario 
--

ALTER TABLE Usuario ADD CONSTRAINT RefTipoUsuario5 
    FOREIGN KEY (IdTipoUsuario)
    REFERENCES TipoUsuario(IdTipoUsuario)
;


-- 
-- TABLE: Vacaciones 
--

ALTER TABLE Vacaciones ADD CONSTRAINT RefPersonal29 
    FOREIGN KEY (IdPersonal)
    REFERENCES Personal(IdPersonal)
;


-- 
-- TABLE: Viajes 
--

ALTER TABLE Viajes ADD CONSTRAINT RefPersonal28 
    FOREIGN KEY (IdPersonal)
    REFERENCES Personal(IdPersonal)
;


-- 
-- TABLE: Viaticos 
--

ALTER TABLE Viaticos ADD CONSTRAINT RefPoblacion32 
    FOREIGN KEY (IdPoblacion)
    REFERENCES Poblacion(IdPoblacion)
;

ALTER TABLE Viaticos ADD CONSTRAINT RefPersonal33 
    FOREIGN KEY (IdPersonal)
    REFERENCES Personal(IdPersonal)
;


