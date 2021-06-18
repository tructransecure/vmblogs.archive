#### VMBlogs Archive - Hướng dẫn restore blog wordpress từ backup

------

![homepage](https://github.com/tructransecure/vmblogs.archive/blob/main/resource/homepage.png)

Để cài đặt blog worppress, chúng ta cần có đủ các thành phần cơ bản như sau:

- PHP7
- Database server (MySQL/MariaDB)
- Web server (httpd)

Trong nội dung bài viết này, mình sẽ hướng dẫn cách cài đặt các thành phần trên với hệ điều hành CentOS phiên bản Minimal (sử dụng dòng lệnh 100%), áp dụng tương tự cho các phiên bản hệ điều hành nền RedHat như CentOS, Fedora, RedHat...

##### Cài đặt các thành phần cần thiết

Cài đặt các repo bổ sung cho CentOS

```
yum install epel-release -y
rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-7.rpm
yum update -y
```

###### Cài đặt các thành phần cơ bản để chạy web php (wordpress)

Cài đặt php và httpd

```
yum install --enablerepo=remi-php74 php php-common php-cli php-gd php-mysql php-pdo php-soap php-mbstring php-xmlrpc php-mcrypt php-json
```

Cài đặt database server

```
yum install mariadb mariadb-server -y
```

##### Cấu hình web server (httpd) và database server (MariaDB server)

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

