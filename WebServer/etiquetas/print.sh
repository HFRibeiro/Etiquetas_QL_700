#!bin/bash
export BROTHER_QL_PRINTER=/dev/usb/lp2
export BROTHER_QL_MODEL=QL-700
brother_ql print -l 50  /var/www/html/etiquetas/generated.png
#echo $1;
#echo $2;
