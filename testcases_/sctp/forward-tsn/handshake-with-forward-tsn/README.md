# Status of the Handshake with Forward-TSN Tests

| Name                                                                                             | Implemented | Finalized FreeBSD | Finalized Linux |
|:------------------------------------------------------------------------------------------------:|:-----------:|:-----------------:|:---------------:|
| [handshake-with-forward-tsn-1](handshake-with-forward-tsn-1.pkt)                                 | Yes         | Yes (Note 4)      | Yes             |
| [handshake-with-forward-tsn-2](handshake-with-forward-tsn-2.pkt)                                 | Yes         | Yes               | Yes             |
| [handshake-with-forward-tsn-3](handshake-with-forward-tsn-3.pkt)                                 | Yes         | Yes (Note 4)      | Yes             |
| [handshake-with-forward-tsn-4](handshake-with-forward-tsn-4.pkt)                                 | Yes         | Yes               | Yes (Note 1)    |
| [handshake-with-forward-tsn-5](handshake-with-forward-tsn-5.pkt)                                 | Yes         | Yes               | Yes (Note 2)    |
| [handshake-with-forward-tsn-6](handshake-with-forward-tsn-6.pkt)                                 | Yes         | Yes               | Yes             |
| [handshake-with-forward-tsn-7](handshake-with-forward-tsn-7.pkt)                                 | Yes         | No (Note 3)       | No  (Note 3)    |
| [handshake-with-forward-tsn-operational-error](handshake-with-forward-tsn-operational-error.pkt) | Yes         | Yes               | Yes             |

# Notes
1. The Linux Kernel Implementation does not send an ERROR-Chunk, instead it silently discards the FORWARD-TSN-Chunk
2. The Linux Kernel Implementation does not send an ERROR-Chunk, it accepts the FORWARD-TSN-Chunk and sends a SACK-Chunk.
3. Due to a limitation in packetdrill not applicable at the moment.
4. The FreeBSD Implementation does not list the FORWARD-TSN-SUPPORTED parameter at the unrecognized parameters.

