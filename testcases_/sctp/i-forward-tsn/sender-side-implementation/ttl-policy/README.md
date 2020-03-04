# Status of the Sender Side Implementation TTL Tests

| Name                                                                         | Implemented   | Finalized FreeBSD  |
| :--------------------------------------------------------------------------: | :-----------: | :----------------: |
| [sender-side-implementation-1.pkt](sender-side-implementation-1.pkt "-")     | Yes           | Yes                |
| [sender-side-implementation-10.pkt](sender-side-implementation-10.pkt "-")   | Yes           | Yes                |
| [sender-side-implementation-11.pkt](sender-side-implementation-11.pkt "-")   | Yes           | Yes                |
| [sender-side-implementation-12.pkt](sender-side-implementation-12.pkt "-")   | Yes           | Yes                |
| [sender-side-implementation-2.pkt](sender-side-implementation-2.pkt "-")     | Yes           | Yes                |
| [sender-side-implementation-3.pkt](sender-side-implementation-3.pkt "-")     | Yes           | Yes                |
| [sender-side-implementation-4.pkt](sender-side-implementation-4.pkt "-")     | Yes           | Yes (Note 1)       |
| [sender-side-implementation-5.pkt](sender-side-implementation-5.pkt "-")     | Yes           | Yes                |
| [sender-side-implementation-6.pkt](sender-side-implementation-6.pkt "-")     | Yes           | Yes (Note 2)       |
| [sender-side-implementation-7.pkt](sender-side-implementation-7.pkt "-")     | Yes           | Yes                |
| [sender-side-implementation-8.pkt](sender-side-implementation-8.pkt "-")     | Yes           | Yes                |
| [sender-side-implementation-9.pkt](sender-side-implementation-9.pkt "-")     | Yes           | Yes                |

# Notes
1. The FreeBSD Kernel Implementation does not bundle the FORWARD-TSN-Chunk with the outstanding DATA-Chunk.
2. The FreeBSD Kernel Implementation does not discard the abandoned user message and tries to deliver it.
