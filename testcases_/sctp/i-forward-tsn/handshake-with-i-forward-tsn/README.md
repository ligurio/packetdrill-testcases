# Status of the Handshake with I-Forward-TSN Tests

| Name                                                                             | Implemented   | Finalized FreeBSD   |
| :------------------------------------------------------------------------------: | :-----------: | :-----------------: |
| [handshake-with-i-forward-tsn-1.pkt](handshake-with-i-forward-tsn-1.pkt "-")     | Yes           | Yes                 |
| [handshake-with-i-forward-tsn-10.pkt](handshake-with-i-forward-tsn-10.pkt "-")   | Yes           | Yes                 |
| [handshake-with-i-forward-tsn-11.pkt](handshake-with-i-forward-tsn-11.pkt "-")   | Yes           | Yes                 |
| [handshake-with-i-forward-tsn-12.pkt](handshake-with-i-forward-tsn-12.pkt "-")   | Yes           | Yes                 |
| [handshake-with-i-forward-tsn-13.pkt](handshake-with-i-forward-tsn-13.pkt "-")   | Yes           | Yes                 |
| [handshake-with-i-forward-tsn-14.pkt](handshake-with-i-forward-tsn-14.pkt "-")   | Yes           | Yes (Note 3)        |
| [handshake-with-i-forward-tsn-15.pkt](handshake-with-i-forward-tsn-15.pkt "-")   | Yes           | Yes                 |
| [handshake-with-i-forward-tsn-2.pkt](handshake-with-i-forward-tsn-2.pkt "-")     | Yes           | Yes                 |
| [handshake-with-i-forward-tsn-3.pkt](handshake-with-i-forward-tsn-3.pkt "-")     | Yes           | Yes (Note 1)        |
| [handshake-with-i-forward-tsn-4.pkt](handshake-with-i-forward-tsn-4.pkt "-")     | Yes           | Yes                 |
| [handshake-with-i-forward-tsn-5.pkt](handshake-with-i-forward-tsn-5.pkt "-")     | Yes           | Yes (Note 2)        |
| [handshake-with-i-forward-tsn-6.pkt](handshake-with-i-forward-tsn-6.pkt "-")     | Yes           | Yes                 |
| [handshake-with-i-forward-tsn-7.pkt](handshake-with-i-forward-tsn-7.pkt "-")     | Yes           | Yes                 |
| [handshake-with-i-forward-tsn-8.pkt](handshake-with-i-forward-tsn-8.pkt "-")     | Yes           | Yes                 |
| [handshake-with-i-forward-tsn-9.pkt](handshake-with-i-forward-tsn-9.pkt "-")     | Yes           | Yes (Note 3)        |

# Notes
1. The FreeBSD Implementation does not list the FORWARD-TSN-SUPPORTED parameter at the unrecognized parameters.
2. The FreeBSD Implementation does not send an ERROR-Chunk. Instead it accepts the I_FORWARD_TSN-Chunk and sends a SACK-Chunk.
3. Although the other side only listed I_DATA and FORWARD_TSN on the supported extensions on the handshake it still uses the I_FORWARD_
   TSN and I_DATA Chunk.
