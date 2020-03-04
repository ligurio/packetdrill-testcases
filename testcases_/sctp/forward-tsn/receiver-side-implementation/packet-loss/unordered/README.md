# Status of the Receicer Side Implementation Packet Loss Unordered Tests

| Name                                                     | Implemented | Finalized FreeBSD | Finalized Linux |
|:--------------------------------------------------------:|:-----------:|:-----------------:|:---------------:|
| [unordered-packet-loss-1](unordered-packet-loss-1.pkt)   | Yes         | Yes               | Yes             |
| [unordered-packet-loss-2](unordered-packet-loss-2.pkt)   | Yes         | Yes               | Yes (Note 1)    |
| [unordered-packet-loss-3](unordered-packet-loss-3.pkt)   | Yes         | Yes               | Yes             |
| [unordered-packet-loss-4](unordered-packet-loss-4.pkt)   | Yes         | Yes               | Yes             |
| [unordered-packet-loss-5](unordered-packet-loss-5.pkt)   | Yes         | Yes               | Yes (Note 1)    |
| [unordered-packet-loss-6](unordered-packet-loss-6.pkt)   | Yes         | Yes (Note 2)      | Yes             |
| [unordered-packet-loss-7](unordered-packet-loss-7.pkt)   | Yes         | Yes (Note 2)      | Yes             |
| [unordered-packet-loss-8](unordered-packet-loss-8.pkt)   | Yes         | Yes               | Yes             |
| [unordered-packet-loss-9](unordered-packet-loss-9.pkt)   | Yes         | Yes               | Yes             |
| [unordered-packet-loss-10](unordered-packet-loss-10.pkt) | Yes         | Yes (Note 3)      | Yes             |
| [unordered-packet-loss-11](unordered-packet-loss-11.pkt) | Yes         | Yes (Note 2)      | Yes             |
| [unordered-packet-loss-12](unordered-packet-loss-12.pkt) | Yes         | Yes               | Yes (Note 1)    |
| [unordered-packet-loss-13](unordered-packet-loss-13.pkt) | Yes         | Yes (Note 4)      | Yes             |
| [unordered-packet-loss-14](unordered-packet-loss-14.pkt) | Yes         | Yes (Note 2)      | Yes             |

# Notes
1. The Linux Kernel Implememtation sends correct but slightly out-of-date informations in the SACK-Chunk, because it seems
   to first process the FORWARD-TSN-Chunk and sends directly a SACK-CHUNK without looking at the bundled DATA-Chunk.
2. The FreeBSD Kernel Implementation does not allow to receive the available user messages before the first fragmented user message was 
   fully received by the kernel.
3. The FreeBSD Kernel Implementation sends an ABORT Chunk with the Cause Protocol Violation instead of a SACK Chunk in line 76.
4. The FreeBSD Kernel Implementation does not allow to receive the user message at line 84.
