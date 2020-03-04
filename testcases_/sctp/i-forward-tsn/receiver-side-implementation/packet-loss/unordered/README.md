# Status of the Unordered Packet Loss Tests

| Name                                                               | Implemented   | Finalized FreeBSD  |
| :----------------------------------------------------------------: | :-----------: | :----------------: |
| [unordered-packet-loss-1.pkt](unordered-packet-loss-1.pkt "-")     | Yes           | Yes                |
| [unordered-packet-loss-10.pkt](unordered-packet-loss-10.pkt "-")   | Yes           | Yes                |
| [unordered-packet-loss-11.pkt](unordered-packet-loss-11.pkt "-")   | Yes           | Yes                |
| [unordered-packet-loss-12.pkt](unordered-packet-loss-12.pkt "-")   | Yes           | Yes                |
| [unordered-packet-loss-13.pkt](unordered-packet-loss-13.pkt "-")   | Yes           | Yes                |
| [unordered-packet-loss-14.pkt](unordered-packet-loss-14.pkt "-")   | Yes           | Yes                |
| [unordered-packet-loss-2.pkt](unordered-packet-loss-2.pkt "-")     | Yes           | Yes (Note 1)       |
| [unordered-packet-loss-3.pkt](unordered-packet-loss-3.pkt "-")     | Yes           | Yes (Note 1)       |
| [unordered-packet-loss-4.pkt](unordered-packet-loss-4.pkt "-")     | Yes           | Yes                |
| [unordered-packet-loss-5.pkt](unordered-packet-loss-5.pkt "-")     | Yes           | Yes                |
| [unordered-packet-loss-6.pkt](unordered-packet-loss-6.pkt "-")     | Yes           | Yes                |
| [unordered-packet-loss-7.pkt](unordered-packet-loss-7.pkt "-")     | Yes           | Yes                |
| [unordered-packet-loss-8.pkt](unordered-packet-loss-8.pkt "-")     | Yes           | Yes                |
| [unordered-packet-loss-9.pkt](unordered-packet-loss-9.pkt "-")     | Yes           | Yes                |

# Notes
1. The FreeBSD Implementation delivers on sctp_recvmsg the wrong ppid (1 instead of 1234) to the userland.
   (fixed with https://svnweb.freebsd.org/changeset/base/309851)
