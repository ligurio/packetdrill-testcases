# Status of the Sender Side Implementation Shutdown TTL Tests

| Name                                     | Implemented   | Finalized FreeBSD | Finalized Linux |
| :--------------------------------------: | :-----------: | :---------------: | :-------------: |
| [shutdown-1.pkt](shutdown-1.pkt "-")     | Yes           | Yes               | Yes (Note 1)    |
| [shutdown-10.pkt](shutdown-10.pkt "-")   | Yes           | Yes               | Yes             |
| [shutdown-11.pkt](shutdown-11.pkt "-")   | Yes           | Yes               | Yes             |
| [shutdown-12.pkt](shutdown-12.pkt "-")   | Yes           | Yes               | Yes             |
| [shutdown-13.pkt](shutdown-13.pkt "-")   | Yes           | Yes               | Yes             |
| [shutdown-2.pkt](shutdown-2.pkt "-")     | Yes           | Yes               | Yes (Note 1)    |
| [shutdown-3.pkt](shutdown-3.pkt "-")     | Yes           | Yes               | Yes             |
| [shutdown-4.pkt](shutdown-4.pkt "-")     | Yes           | Yes               | Yes             |
| [shutdown-5.pkt](shutdown-5.pkt "-")     | Yes           | Yes               | Yes             |
| [shutdown-6.pkt](shutdown-6.pkt "-")     | Yes           | Yes               | Yes             |
| [shutdown-7.pkt](shutdown-7.pkt "-")     | Yes           | Yes               | Yes             |
| [shutdown-8.pkt](shutdown-8.pkt "-")     | Yes           | Yes               | Yes             |
| [shutdown-9.pkt](shutdown-9.pkt "-")     | Yes           | Yes               | Yes             |

# Notes
1. After the tests passed, any further restarts of the same or any other test case will result in an failing bind-call.
   This is due to the fact that the test called sctp_sendmsg after shutdown has been called, which
   seems to result in an locked resource.
