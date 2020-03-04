# Status of the Handshake with NR-SACK-Extension Tests

| Name                                                               | Implemented   | Finalized FreeBSD   |
| :----------------------------------------------------------------: | :-----------: | :-----------------: |
| [handshake-with-nr-sack-1.pkt](handshake-with-nr-sack-1.pkt "-")   | Yes           | Yes                 |
| [handshake-with-nr-sack-2.pkt](handshake-with-nr-sack-2.pkt "-")   | Yes           | Yes                 |
| [handshake-with-nr-sack-3.pkt](handshake-with-nr-sack-3.pkt "-")   | Yes           | Yes                 |
| [handshake-with-nr-sack-4.pkt](handshake-with-nr-sack-4.pkt "-")   | Yes           | Yes                 |
| [handshake-with-nr-sack-5.pkt](handshake-with-nr-sack-5.pkt "-")   | Yes           | Yes                 |
| [handshake-with-nr-sack-6.pkt](handshake-with-nr-sack-6.pkt "-")   | Yes           | Yes                 |
| [handshake-with-nr-sack-7.pkt](handshake-with-nr-sack-7.pkt "-")   | Yes           | Yes (Note 1)        |
| [handshake-with-nr-sack-8.pkt](handshake-with-nr-sack-8.pkt "-")   | Yes           | Yes (Note 1)        |

# Notes
1. This test assumes that if both sides support the NR-SACK extension incoming SACK-Chunks are allowed.
   This should be stated more cleary in the specification how to handle those situations.
