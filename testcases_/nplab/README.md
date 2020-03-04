# packetdrill

A fork of [packetdrill](https://code.google.com/p/packetdrill/) which adds support for
* UDPLite as specified in [RFC 3828](https://tools.ietf.org/html/rfc3828)
* SCTP as specified in [RFC 4960](https://tools.ietf.org/html/rfc4960),  [RFC 4820](https://tools.ietf.org/html/rfc4820), [RFC 6458](https://tools.ietf.org/html/rfc6458), and [RFC 7053](https://tools.ietf.org/html/rfc7053)

## Installation

### MacOS (El Capitan and higer)
Download the sources, compile them and install the binary:
```
git clone https://github.com/nplab/packetdrill.git
cd packetdrill/gtests/net/packetdrill/
./configure
make
sudo cp packetdrill /usr/bin
```

### Linux (Ubuntu)
For installing the required packages run:
```
sudo apt-get install make git libsctp-dev bison flex python
```
Then download the sources, compile them and install the binary:
```
git clone https://github.com/nplab/packetdrill.git
cd packetdrill/gtests/net/packetdrill/
./configure
make
sudo cp packetdrill /usr/bin
```
### FreeBSD
For installing the required packages run:
```
sudo pkg install git bison python
```
Then download the sources, compile them and install the binary:
```
git clone https://github.com/nplab/packetdrill.git
cd packetdrill/gtests/net/packetdrill/
./configure
make
sudo cp packetdrill /usr/local/bin
```
To be able to run packetdrill in combination with `sudo` run
```
sudo sysctl -w vm.old_mlock=1
```
or add
```
vm.old_mlock=1
```
to `/etc/sysctl.conf` and reboot.
