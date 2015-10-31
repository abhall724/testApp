#!/bin/env bash

XD_VERSION=xdebug-2.3.2
CWD=`pwd`

TMPDIR=`mktemp -d`
echo $TMPDIR

cd $TMPDIR
wget http://xdebug.org/files/$XD_VERSION.tgz
tar xzf $XD_VERSION.tgz
cd $XD_VERSION
phpize
./configure
make
cp modules/xdebug.so /opt/rh/php54/root/usr/lib64/php/modules

cp /vagrant/xdebug.ini /opt/rh/php54/root/etc/php.d/

service httpd restart

rm -rf $TMPDIR

cd $CWD
