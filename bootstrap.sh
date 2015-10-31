#!/bin/env bash

rm -f /etc/localtime && ln -s /usr/share/zoneinfo/America/New_York /etc/localtime

sed -i '/^\[base\]/a \
exclude=postgresql\*' /etc/yum.repos.d/CentOS-Base.repo
sed -i '/^\[updates\]/a \
exclude=postgresql\*' /etc/yum.repos.d/CentOS-Base.repo

yum -y install centos-release-SCL screen wget gcc ant

yum -y install httpd mod_ssl php54-php php54-php-cli php54-php-pdo php54-php-xml php54-php-soap php54-php-mbstring php54-php-devel php54-php-pecl-memcache php54-php-bcmath

[ -f /etc/profile.d/php54-enable.sh ] || ln -s /opt/rh/php54/enable /etc/profile.d/php54-enable.sh
source /etc/profile.d/php54-enable.sh

# Avoid this warning Starting httpd: httpd: Could not reliably determine the server's fully qualified domain name, using localhost.localdomain for ServerName
sed -i -e '/\#ServerName.*www\.example\.com\:80/a ServerName localhost' /etc/httpd/conf/httpd.conf

mkdir -p /vagrant/logs
cp /vagrant/httpd-app.conf /etc/httpd/conf.d/
cp /vagrant/vagrant.conf /etc/httpd/conf.d/
cp /vagrant/50-vagrant-mount.rules /etc/udev/rules.d/
chkconfig httpd on
sed -i -e 's/^SELINUX=.*/SELINUX=permissive/' /etc/selinux/config
setenforce 0
service httpd restart

/vagrant/xdebug-php54-install.sh

chkconfig iptables off
chkconfig ip6tables offexit
service iptables stop
service ip6tables stop
yum -y install php54-php-process

[ -f /usr/local/bin/composer ] || (curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer)

su - vagrant -c "composer global require phpunit/phpunit ~4.8"
su - vagrant -c "composer global require phpmd/phpmd ~2.3"
grep -q 'composer' /home/vagrant/.bashrc || echo 'PATH=$PATH:/home/vagrant/.composer/vendor/bin' >> /home/vagrant/.bashrc
