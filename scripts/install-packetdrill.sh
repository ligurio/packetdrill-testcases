#!/bin/sh

set -ex

if [ -z "$NPLAB" ]; then
  git_repo="https://github.com/google/packetdrill"
else
  git_repo="https://github.com/nplab/packetdrill"
fi

UNAME=$(uname)

if [ "$UNAME" == "Linux" ] ; then
  echo "Linux"
  apt-get install -y make git libsctp-dev bison flex python
elif [ "$UNAME" == "Darwin" ] ; then
  echo "Darwin"
fi

[ ! -d 'packetdrill/gtests/net/packetdrill' ] && $(rm -rf packetdrill; git clone $git_repo)
cd packetdrill/gtests/net/packetdrill
./configure
make
install -m 0555 packetdrill /usr/local/bin
