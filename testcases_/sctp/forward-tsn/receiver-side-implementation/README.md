## Structure of the Testsuite
| Test Group                                                                             | Number of Test Scripts   | Status   |
| :------------------------------------------------------------------------------------- | :----------------------: | :------: |
| [Tests with Packet Loss](packet-loss/README.md)                                        | 65                       | Done     |

# Status of the Receicer Side Implementation 

| Name                                                                   | Implemented | Finalized FreeBSD | Finalized Linux |
|:----------------------------------------------------------------------:|:-----------:|:-----------------:|:---------------:|
| [receiver-side-implementation-1](receiver-side-implementation-1.pkt)   | Yes         | Yes (Note 1)      | Yes             |
| [receiver-side-implementation-2](receiver-side-implementation-2.pkt)   | Yes         | Yes               | Yes             |
| [receiver-side-implementation-3](receiver-side-implementation-3.pkt)   | Yes         | Yes (Note 1)      | Yes             |
| [receiver-side-implementation-4](receiver-side-implementation-4.pkt)   | Yes         | Yes               | Yes             |
| [receiver-side-implementation-5](receiver-side-implementation-5.pkt)   | Yes         | Yes               | Yes             |
| [receiver-side-implementation-6](receiver-side-implementation-6.pkt)   | Yes         | Yes               | Yes             |
| [receiver-side-implementation-7](receiver-side-implementation-7.pkt)   | Yes         | Yes               | Yes             |
| [receiver-side-implementation-8](receiver-side-implementation-8.pkt)   | Yes         | Yes               | Yes             |
| [receiver-side-implementation-9](receiver-side-implementation-9.pkt)   | Yes         | Yes               | Yes             |
| [receiver-side-implementation-10](receiver-side-implementation-10.pkt) | Yes         | Yes               | Yes             |
| [receiver-side-implementation-11](receiver-side-implementation-11.pkt) | Yes         | Yes               | Yes (Note 2)    |

# Notes
1. The FreeBSD Kernel Implementation did not react to incoming FORWARD-TSN-Chunk without any previous DATA-Chunk.
   This issue is solved by [FreeBSD Revision 304837](https://svnweb.freebsd.org/changeset/base/304837)
2. The Linux Kernel Implementation does not react to the valid FORWARD-TSN-Chunk in this test case and silently
   ignores it.
