# Status of the Mixed Packet Loss Tests

| Name                                                       | Implemented   | Finalized FreeBSD |
| :--------------------------------------------------------: | :-----------: | :---------------: |
| [mixed-packet-loss-1.pkt](mixed-packet-loss-1.pkt "-")     | Yes           | Yes               |
| [mixed-packet-loss-10.pkt](mixed-packet-loss-10.pkt "-")   | Yes           | Yes               |
| [mixed-packet-loss-11.pkt](mixed-packet-loss-11.pkt "-")   | Yes           | Yes               |
| [mixed-packet-loss-12.pkt](mixed-packet-loss-12.pkt "-")   | Yes           | Yes               |
| [mixed-packet-loss-13.pkt](mixed-packet-loss-13.pkt "-")   | Yes           | Yes               |
| [mixed-packet-loss-14.pkt](mixed-packet-loss-14.pkt "-")   | Yes           | Yes               |
| [mixed-packet-loss-15.pkt](mixed-packet-loss-15.pkt "-")   | Yes           | Yes               |
| [mixed-packet-loss-16.pkt](mixed-packet-loss-16.pkt "-")   | Yes           | Yes               |
| [mixed-packet-loss-17.pkt](mixed-packet-loss-17.pkt "-")   | Yes           | Yes               |
| [mixed-packet-loss-18.pkt](mixed-packet-loss-18.pkt "-")   | Yes           | Yes               |
| [mixed-packet-loss-19.pkt](mixed-packet-loss-19.pkt "-")   | Yes           | Yes               |
| [mixed-packet-loss-2.pkt](mixed-packet-loss-2.pkt "-")     | Yes           | Yes               |
| [mixed-packet-loss-20.pkt](mixed-packet-loss-20.pkt "-")   | Yes           | Yes               |
| [mixed-packet-loss-21.pkt](mixed-packet-loss-21.pkt "-")   | Yes           | Yes               |
| [mixed-packet-loss-22.pkt](mixed-packet-loss-22.pkt "-")   | Yes           | Yes               |
| [mixed-packet-loss-23.pkt](mixed-packet-loss-23.pkt "-")   | Yes           | Yes               |
| [mixed-packet-loss-24.pkt](mixed-packet-loss-24.pkt "-")   | Yes           | Yes               |
| [mixed-packet-loss-25.pkt](mixed-packet-loss-25.pkt "-")   | Yes           | Yes               |
| [mixed-packet-loss-26.pkt](mixed-packet-loss-26.pkt "-")   | Yes           | Yes               |
| [mixed-packet-loss-27.pkt](mixed-packet-loss-27.pkt "-")   | Yes           | Yes               |
| [mixed-packet-loss-28.pkt](mixed-packet-loss-28.pkt "-")   | Yes           | Yes               |
| [mixed-packet-loss-29.pkt](mixed-packet-loss-29.pkt "-")   | Yes           | Yes               |
| [mixed-packet-loss-3.pkt](mixed-packet-loss-3.pkt "-")     | Yes           | Yes (Note 1)      |
| [mixed-packet-loss-30.pkt](mixed-packet-loss-30.pkt "-")   | Yes           | Yes               |
| [mixed-packet-loss-31.pkt](mixed-packet-loss-31.pkt "-")   | Yes           | Yes               |
| [mixed-packet-loss-4.pkt](mixed-packet-loss-4.pkt "-")     | Yes           | Yes (Note 1)      |
| [mixed-packet-loss-5.pkt](mixed-packet-loss-5.pkt "-")     | Yes           | Yes (Note 1)      |
| [mixed-packet-loss-6.pkt](mixed-packet-loss-6.pkt "-")     | Yes           | Yes (Note 1)      |
| [mixed-packet-loss-7.pkt](mixed-packet-loss-7.pkt "-")     | Yes           | Yes               |
| [mixed-packet-loss-8.pkt](mixed-packet-loss-8.pkt "-")     | Yes           | Yes               |
| [mixed-packet-loss-9.pkt](mixed-packet-loss-9.pkt "-")     | Yes           | Yes               |

# Notes
1. The FreeBSD Implementation delivers on sctp_recvmsg the wrong ppid (1 instead of 1235) to the userland.
   (fixed with https://svnweb.freebsd.org/changeset/base/309851)
