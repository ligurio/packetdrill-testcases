#!/bin/sh
# Set standard production config values that relate to TCP behavior.

os=$(uname -o)
if [ "$os" == "GNU/Linux" ]; then
  . scripts/defaults-linux.sh
elif [ "$os" == "FreeBSD" ]; then
  . scripts/defaults-freebsd.sh
fi
