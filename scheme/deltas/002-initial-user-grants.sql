GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY PASSWORD '*053833B805A00EC54F9919EAF6191070BAF6602A';
GRANT USAGE ON *.* TO 'asterisk'@'%' IDENTIFIED BY PASSWORD '*B1745AABE8FF81695592076E0F0D90D3FAB17F67';
GRANT ALL PRIVILEGES ON `ivozprovider`.* TO 'asterisk'@'%';
GRANT USAGE ON *.* TO 'kamailio'@'%' IDENTIFIED BY PASSWORD '*B1745AABE8FF81695592076E0F0D90D3FAB17F67';
GRANT ALL PRIVILEGES ON `ivozprovider`.* TO 'kamailio'@'%';
FLUSH PRIVILEGES;
