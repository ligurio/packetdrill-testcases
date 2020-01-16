#!/bin/sh
# Set standard production config values that relate to TCP behavior.

UNAME=$(uname)

if [ "$UNAME" == "Linux" ] ; then
  echo "Linux"
  . scripts/defaults-linux.sh
elif [ "$UNAME" == "FreeBSD" ] ; then
  echo "FreeBSD"
  . scripts/defaults-freebsd.sh
elif [ "$UNAME" == "Darwin" ] ; then
  echo "Darwin"
fi
