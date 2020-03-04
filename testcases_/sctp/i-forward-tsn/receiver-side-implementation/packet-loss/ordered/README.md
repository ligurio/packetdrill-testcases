# Status of the Ordered Packet Loss Tests

| Name                                                               | Implemented   | Finalized FreeBSD |
| :----------------------------------------------------------------: | :-----------: | :---------------: |
| [ordered-packet-loss-1.pkt](ordered-packet-loss-1.pkt "-")         | Yes           | Yes               |
| [ordered-packet-loss-10.pkt](ordered-packet-loss-10.pkt "-")       | Yes           | Yes               |
| [ordered-packet-loss-11.pkt](ordered-packet-loss-11.pkt "-")       | Yes           | Yes               |
| [ordered-packet-loss-12.pkt](ordered-packet-loss-12.pkt "-")       | Yes           | Yes               |
| [ordered-packet-loss-13.pkt](ordered-packet-loss-13.pkt "-")       | Yes           | Yes               |
| [ordered-packet-loss-14.pkt](ordered-packet-loss-14.pkt "-")       | Yes           | Yes               |
| [ordered-packet-loss-14_1.pkt](ordered-packet-loss-14_1.pkt "-")   | Yes           | Yes               |
| [ordered-packet-loss-2.pkt](ordered-packet-loss-2.pkt "-")         | Yes           | Yes (Note 1)      |
| [ordered-packet-loss-2_1.pkt](ordered-packet-loss-2_1.pkt "-")     | Yes           | Yes (Note 1)      |
| [ordered-packet-loss-3.pkt](ordered-packet-loss-3.pkt "-")         | Yes           | Yes               |
| [ordered-packet-loss-4.pkt](ordered-packet-loss-4.pkt "-")         | Yes           | Yes               |
| [ordered-packet-loss-4_1.pkt](ordered-packet-loss-4_1.pkt "-")     | Yes           | Yes               |
| [ordered-packet-loss-5.pkt](ordered-packet-loss-5.pkt "-")         | Yes           | Yes               |
| [ordered-packet-loss-5_1.pkt](ordered-packet-loss-5_1.pkt "-")     | Yes           | Yes               |
| [ordered-packet-loss-6.pkt](ordered-packet-loss-6.pkt "-")         | Yes           | Yes               |
| [ordered-packet-loss-6_1.pkt](ordered-packet-loss-6_1.pkt "-")     | Yes           | Yes               |
| [ordered-packet-loss-7.pkt](ordered-packet-loss-7.pkt "-")         | Yes           | Yes               |
| [ordered-packet-loss-8.pkt](ordered-packet-loss-8.pkt "-")         | Yes           | Yes               |
| [ordered-packet-loss-9.pkt](ordered-packet-loss-9.pkt "-")         | Yes           | Yes               |
| [ordered-packet-loss-9_1.pkt](ordered-packet-loss-9_1.pkt "-")     | Yes           | Yes               |

# Notes
1. The FreeBSD Implementation delivers on sctp_recvmsg the wrong ppid (1 instead of 1234) to the userland.
   (fixed with https://svnweb.freebsd.org/changeset/base/309851)
