--유저 테이블 생성
CREATE TABLE `GY`.`T_USER` (
	`USER_CD` INT AUTO_INCREMENT NOT NULL COMMENT '회원 코드' ,
	`USER_ID` VARCHAR(50) NOT NULL COMMENT '아이디' ,
	`USER_PW` VARCHAR(100) NOT NULL COMMENT '비밀번호' ,
	`CR_TIME` DATE NOT NULL COMMENT '생성일' ,
	`MODY_TIME` DATE NULL COMMENT '수정일' ,
	PRIMARY KEY (`USER_CD`)
) ENGINE = InnoDB;

--세션 테이블 생성
CREATE TABLE IF NOT EXISTS  `ci_sessions` (
    session_id varchar(40) DEFAULT '0' NOT NULL,
    ip_address varchar(16) DEFAULT '0' NOT NULL,
    user_agent varchar(120) NOT NULL,
    last_activity int(10) unsigned DEFAULT 0 NOT NULL,
    user_data text NOT NULL,
    PRIMARY KEY (session_id),
    KEY `last_activity_idx` (`last_activity`)
);