# SCTP Testsuite for the partial reliability extension on FreeBSD and Linux based on packetdrill

This testsuite focuses on testing the partial partial reliability extension of SCTP.
The test-cases in the FORWARD-TSN-subfolder are developed so that they can test the Linux Kernel Implementation and the FreeBSD
Kernel Implementation. The test-cases in the I-FORWARD-TSN and NR-SACK subfolders can currently only run on FreeBSD.

## Requirements
It it based on the packetdrill testtool.
The original version is available from [Google's repository](https://github.com/google/packetdrill).
However, this version does not really run on FreeBSD.
An extended version is available from [NPLab's respository](https://github.com/nplab/packetdrill)
overcoming this limitation and adding support for SCTP and UDPLite.

## Structure of the Testsuite
| Test Group                                                                             |   Number of Test Scripts | Status        |
| :------------------------------------------------------------------------------------- | :----------------------: | :-----------: |
| [FORWARD-TSN](forward-tsn/README.md)                                                   |                      176 | Done          |
| [I-FORWARD-TSN and I-DATA](i-forward-tsn/README.md)                                    |                      132 | Done          |
| [NR-SACK](nr-sack/README.md)                                                           |                       81 | Done   |

## FreeBSD Fixes
* [r303834](https://svnweb.freebsd.org/changeset/base/303834)
* [r304837](https://svnweb.freebsd.org/changeset/base/304837)
* [r309851](https://svnweb.freebsd.org/changeset/base/309851)

## Linux Fixes
* [process fwd tsn chunk only when prsctp is enabled](https://patchwork.ozlabs.org/patch/723509/)

## References
* [Formal definition of test cases](https://nplab.github.io/PR_SCTP_Testsuite/)
