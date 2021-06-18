## VMBlogs Archive - Hướng dẫn restore blog wordpress từ backup

------

![homepage](https://github.com/tructransecure/vmblogs.archive/blob/main/resource/homepage.jpg)

Để cài đặt blog worppress, chúng ta cần có đủ các thành phần cơ bản như sau:

- PHP7
- Database server (MySQL/MariaDB)
- Web server (httpd)

Trong nội dung bài viết này, mình sẽ hướng dẫn cách cài đặt các thành phần trên với hệ điều hành CentOS phiên bản Minimal (sử dụng dòng lệnh 100%), áp dụng tương tự cho các phiên bản hệ điều hành nền RedHat như CentOS, Fedora, RedHat...

### 1.Cài đặt các thành phần cần thiết

#### Cài đặt các repo bổ sung cho CentOS

```
yum install epel-release -y
rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-7.rpm
yum update -y
```

#### Cài đặt các thành phần cơ bản để chạy web php (wordpress)

Cài đặt php và httpd

```
yum install --enablerepo=remi-php74 php php-common php-cli php-gd php-mysql php-pdo php-soap php-mbstring php-xmlrpc php-mcrypt php-json
```

Cài đặt database server

```
yum install mariadb mariadb-server -y
```

### 2.Cấu hình web server (httpd) và database server (MariaDB server)

Cấu hình service chạy lúc khởi động

```
systemctl enable httpd
systemctl enable mariadb
```

Start service

```
systemctl start httpd
systemctl start mariadb
```

Cấu hình bảo mật MariaDB

```
mysql_secure_installation
```

### 3.Restore database

Copy file backup database lên máy chủ vào một thư mục nào đó ví dụ /home/vmblogs3_db.sql

Đăng nhập database server bằng tài khoản root đã tạo ở bước mysql_secure_installation

```
mysql -u root -p
```

Tạo database cho wordpress và gán tài khoản đăng nhập cho riêng database

```
create database vmblogs3_db;
use vmblogs3_db;
grant all on vmblogs3_db.* to 'vmblogs3_dbuser'@'localhost' identified by 'yscnlav8ko';
```

Restore database

```
mysqldum -u root -p vmblogs3_db < /home/vmblogs3_db.sql
```

hoặc 

```
mysql -u root -p
use vmblogs3_db;
source /home/vmblogs3_db.sql
```

### 4.Restore thư mục wordpress

Upload thư mục wordpress đã backup lên máy chủ bằng FTP hoặc SFTP vào thư mục bất kỳ ví dụ 

> /var/www/html/vmblogs

Gán quyền cho thư mục

> chown -R apache:apache /var/www/html/vmblogs

### 5.Update cấu hình web server cho thư mục wordpress mới restore

> nano /etc/httpd/conf/httpd.conf

Update một số giá trị để phù hợp với website wordpress restore

```
DocumentRoot => /var/www/html/vmblogs (thư mục web)

AllowOverRide None => AllowOverRide All (cho phép sử dụng .htaccess)
```

Khởi động lại web server

```
systemctl restart httpd
```

### 6.Cấu hình tường lửa cho phép truy cập từ bên ngoài

Để cho phép người dùng truy cập từ bên ngoài, hai port cơ bản của web server là 80 và 443 cần được cấu hình để tường lửa cho phép truy cập

Bật tường lửa và cho phép chạy lúc khởi động

```
systemctl enable firewalld
systemctl start firewalld
```

Cấu hình cho phép dịch vụ web

```
firewall-cmd --zone=public --permanent --add-service=http
firewall-cmd --zone=public --permanent --add-service=https
firewall-cmd --reload
```

### 7.Khác

