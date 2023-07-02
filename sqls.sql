#database
CREATE DATABASE app_db;

#countries
CREATE TABLE app_db.COUNTRIES (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    NAME VARCHAR(100) NOT NULL UNIQUE,
    ISO CHAR(2) NOT NULL UNIQUE
);
ALTER TABLE `app_db`.`COUNTRIES` ADD INDEX `ID_INDEX` (`ID`);
USE app_db;
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Afghanistan', 'AF');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Albania', 'AL');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Algeria', 'DZ');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('American Samoa', 'AS');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Andorra', 'AD');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Angola', 'AO');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Anguilla', 'AI');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Antarctica', 'AQ');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Antigua and Barbuda', 'AG');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Argentina', 'AR');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Armenia', 'AM');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Aruba', 'AW');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Australia', 'AU');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Austria', 'AT');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Azerbaijan', 'AZ');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Bahamas', 'BS');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Bahrain', 'BH');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Bangladesh', 'BD');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Barbados', 'BB');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Belarus', 'BY');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Belgium', 'BE');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Belize', 'BZ');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Benin', 'BJ');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Bermuda', 'BM');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Bhutan', 'BT');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Bosnia and Herzegovina', 'BA');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Botswana', 'BW');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Bouvet Island', 'BV');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Brazil', 'BR');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('British Indian Ocean Territory', 'IO');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Brunei Darussalam', 'BN');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Bulgaria', 'BG');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Burkina Faso', 'BF');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Burundi', 'BI');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Cambodia', 'KH');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Cameroon', 'CM');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Canada', 'CA');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Cape Verde', 'CV');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Cayman Islands', 'KY');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Central African Republic', 'CF');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Chad', 'TD');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Chile', 'CL');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('China', 'CN');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Christmas Island', 'CX');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Cocos (Keeling) Islands', 'CC');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Colombia', 'CO');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Comoros', 'KM');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Congo', 'CG');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Cook Islands', 'CK');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Costa Rica', 'CR');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Croatia', 'HR');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Cuba', 'CU');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Cyprus', 'CY');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Czech Republic', 'CZ');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Denmark', 'DK');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Djibouti', 'DJ');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Dominica', 'DM');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Dominican Republic', 'DO');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Ecuador', 'EC');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Egypt', 'EG');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('El Salvador', 'SV');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Equatorial Guinea', 'GQ');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Eritrea', 'ER');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Estonia', 'EE');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Ethiopia', 'ET');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Falkland Islands (Malvinas)' ,'FK');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Faroe Islands', 'FO');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Fiji', 'FJ');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Finland', 'FI');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('France', 'FR');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('French Guiana', 'GF');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('French Polynesia', 'PF');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('French Southern Territories', 'TF');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Gabon', 'GA');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Gambia', 'GM');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Georgia', 'GE');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Germany', 'DE');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Ghana', 'GH');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Gibraltar', 'GI');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Greece', 'GR');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Greenland', 'GL');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Grenada', 'GD');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Guadeloupe', 'GP');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Guam', 'GU');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Guatemala', 'GT');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Guernsey', 'GG');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Guinea', 'GN');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Guinea-Bissau', 'GW');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Guyana', 'GY');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Haiti', 'HT');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Heard Island and McDonald Islands', 'HM');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Holy See (Vatican City State)' ,'VA');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Honduras', 'HN');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Hong Kong', 'HK');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Hungary', 'HU');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Iceland', 'IS');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('India', 'IN');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Indonesia', 'ID');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Iraq', 'IQ');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Ireland', 'IE');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Isle of Man', 'IM');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Israel', 'IL');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Italy', 'IT');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Jamaica', 'JM');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Japan', 'JP');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Jersey', 'JE');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Jordan', 'JO');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Kazakhstan', 'KZ');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Kenya', 'KE');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Kiribati', 'KI');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Kuwait', 'KW');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Kyrgyzstan', 'KG');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Lao Peoples Democratic Republic', 'LA');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Latvia', 'LV');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Lebanon', 'LB');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Lesotho', 'LS');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Liberia', 'LR');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Libya', 'LY');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Liechtenstein', 'LI');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Lithuania', 'LT');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Luxembourg', 'LU');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Macao', 'MO');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Madagascar', 'MG');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Malawi', 'MW');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Malaysia', 'MY');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Maldives', 'MV');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Mali', 'ML');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Malta', 'MT');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Marshall Islands', 'MH');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Martinique', 'MQ');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Mauritania', 'MR');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Mauritius', 'MU');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Mayotte', 'YT');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Mexico', 'MX');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Monaco', 'MC');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Mongolia', 'MN');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Montenegro', 'ME');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Montserrat', 'MS');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Morocco', 'MA');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Mozambique', 'MZ');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Myanmar', 'MM');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Namibia', 'NA');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Nauru', 'NR');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Nepal', 'NP');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Netherlands', 'NL');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('New Caledonia', 'NC');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('New Zealand', 'NZ');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Nicaragua', 'NI');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Niger', 'NE');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Nigeria', 'NG');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Niue', 'NU');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Norfolk Island', 'NF');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Northern Mariana Islands', 'MP');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Norway', 'NO');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Oman', 'OM');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Pakistan', 'PK');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Palau', 'PW');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Panama', 'PA');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Papua New Guinea', 'PG');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Paraguay', 'PY');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Peru', 'PE');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Philippines', 'PH');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Pitcairn', 'PN');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Poland', 'PL');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Portugal', 'PT');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Puerto Rico', 'PR');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Qatar', 'QA');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Romania', 'RO');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Russian Federation', 'RU');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Rwanda', 'RW');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Saint Kitts and Nevis', 'KN');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Saint Lucia', 'LC');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Saint Martin (French part)' ,'MF');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Saint Pierre and Miquelon', 'PM');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Saint Vincent and the Grenadines', 'VC');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Samoa', 'WS');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('San Marino', 'SM');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Sao Tome and Principe', 'ST');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Saudi Arabia', 'SA');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Senegal', 'SN');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Serbia', 'RS');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Seychelles', 'SC');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Sierra Leone', 'SL');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Singapore', 'SG');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Sint Maarten (Dutch part)' ,'SX');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Slovakia', 'SK');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Slovenia', 'SI');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Solomon Islands', 'SB');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Somalia', 'SO');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('South Africa', 'ZA');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('South Georgia and the South Sandwich Islands', 'GS');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('South Sudan', 'SS');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Spain', 'ES');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Sri Lanka', 'LK');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Sudan', 'SD');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Suriname', 'SR');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Svalbard and Jan Mayen', 'SJ');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Swaziland', 'SZ');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Sweden', 'SE');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Switzerland', 'CH');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Syrian Arab Republic', 'SY');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Tajikistan', 'TJ');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Thailand', 'TH');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Timor-Leste', 'TL');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Togo', 'TG');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Tokelau', 'TK');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Tonga', 'TO');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Trinidad and Tobago', 'TT');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Tunisia', 'TN');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Turkey', 'TR');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Turkmenistan', 'TM');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Turks and Caicos Islands', 'TC');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Tuvalu', 'TV');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Uganda', 'UG');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Ukraine', 'UA');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('United Arab Emirates', 'AE');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('United Kingdom', 'GB');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('United States', 'US');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('United States Minor Outlying Islands', 'UM');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Uruguay', 'UY');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Uzbekistan', 'UZ');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Vanuatu', 'VU');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Viet Nam', 'VN');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Wallis and Futuna', 'WF');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Western Sahara', 'EH');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Yemen', 'YE');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Zambia', 'ZM');
INSERT INTO COUNTRIES (NAME, ISO) VALUES ('Zimbabwe', 'ZW');


#patients
CREATE TABLE `app_db`.`PATIENTS` (`ID` INT NOT NULL AUTO_INCREMENT , `CODE` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL , PRIMARY KEY (`ID`), UNIQUE (`CODE`(50))) ENGINE = InnoDB;
ALTER TABLE `app_db`.`PATIENTS` ADD UNIQUE `ID_INDEX` (`ID`);

#medicines
CREATE TABLE `app_db`.`MEDICINES` (`ID` INT NOT NULL AUTO_INCREMENT , `NAME` VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL , PRIMARY KEY (`ID`), UNIQUE (`NAME`(100))) ENGINE = InnoDB;
ALTER TABLE `app_db`.`MEDICINES` ADD UNIQUE `ID_INDEX` (`ID`);

#read users
CREATE USER 'reader'@'localhost' IDENTIFIED BY 'reader';
GRANT SELECT ON app_db.* TO 'reader'@'localhost';
FLUSH PRIVILEGES;

#insert users
CREATE USER 'updater'@'localhost' IDENTIFIED BY 'updater';
GRANT INSERT, UPDATE ON app_db.* TO 'updater'@'localhost';
FLUSH PRIVILEGES;


