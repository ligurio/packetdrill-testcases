# Status of the Error Cases Ordered Packet Loss Tests

| Name                                                           | Implemented | Finalized Linux | Finalized FreeBSD |
| :------------------------------------------------------------: | :---------: | :-------------: | :---------------: |
| [ordered-packet-loss-1.pkt](ordered-packet-loss-1.pkt "-")     | Yes         | Yes             | Yes               |
| [ordered-packet-loss-10.pkt](ordered-packet-loss-10.pkt "-")   | Yes         | Yes (Note 1)    | Yes               |
| [ordered-packet-loss-11.pkt](ordered-packet-loss-11.pkt "-")   | Yes         | Yes (Note 1)    | Yes               |
| [ordered-packet-loss-12.pkt](ordered-packet-loss-12.pkt "-")   | Yes         | Yes (Note 1)    | Yes               |
| [ordered-packet-loss-13.pkt](ordered-packet-loss-13.pkt "-")   | Yes         | Yes (Note 1)    | Yes               |
| [ordered-packet-loss-14.pkt](ordered-packet-loss-14.pkt "-")   | Yes         | Yes (Note 1)    | Yes               |
| [ordered-packet-loss-2.pkt](ordered-packet-loss-2.pkt "-")     | Yes         | Yes (Note 1)    | Yes               |
| [ordered-packet-loss-3.pkt](ordered-packet-loss-3.pkt "-")     | Yes         | Yes (Note 1)    | Yes               |
| [ordered-packet-loss-4.pkt](ordered-packet-loss-4.pkt "-")     | Yes         | Yes (Note 1)    | Yes               |
| [ordered-packet-loss-5.pkt](ordered-packet-loss-5.pkt "-")     | Yes         | Yes (Note 1)    | Yes               |
| [ordered-packet-loss-6.pkt](ordered-packet-loss-6.pkt "-")     | Yes         | Yes (Note 1)    | Yes               |
| [ordered-packet-loss-7.pkt](ordered-packet-loss-7.pkt "-")     | Yes         | Yes (Note 1)    | Yes               |
| [ordered-packet-loss-8.pkt](ordered-packet-loss-8.pkt "-")     | Yes         | Yes (Note 1)    | Yes               |
| [ordered-packet-loss-9.pkt](ordered-packet-loss-9.pkt "-")     | Yes         | Yes (Note 1)    | Yes               |

# Notes
1. The Linux Kernel Implementation delivers the fragmented ordered user message with inconsistent stream sequence numbers
   to the userland stack although it should discard that user message.
