#!/bin/sh
# Set standard production config values that relate to TCP behavior.

os=$(uname -o)
if [ "$os" -eq "GNU/Linux" ]; then
  . defaults-linux.sh
elif [ "$os" -eq "FreeBSD" ]; then
  . defaults-freebsd.sh
fi
