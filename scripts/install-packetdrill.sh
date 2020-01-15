#!/bin/sh

set -ex

if [ -z "$NPLAB"]; then
  git_repo="https://github.com/google/packetdrill"
else
  git_repo="https://github.com/nplab/packetdrill"
fi

os=$(uname -o)
if [ "$os" -eq "GNU/Linux" ]; then
  apt-get install -y make git libsctp-dev bison flex python
elif [ "$os" -eq "FreeBSD" ]; then
  pkg install git bison python
  sysctl -w vm.old_mlock=1
fi

[ ! -d 'packetdrill/gtests/net/packetdrill' ] && $(rm -rf packetdrill; git clone $git_repo)
cd packetdrill/gtests/net/packetdrill
./configure
make
install -m 0555 packetdrill /usr/local/bin
