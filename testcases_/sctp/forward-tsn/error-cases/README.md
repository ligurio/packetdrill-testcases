## Structure of the Testsuite Forward TSN - Error Cases
| Test Group                                                                             | Number of Test Scripts   | Status   |
| :------------------------------------------------------------------------------------- | :----------------------: | :------: |
| [Tests with inconsistent stream sequence numbers](packet-loss/ordered/README.md)       | 14                       | Done     |


# Status of the FORWARD-TSN Error Cases

| Name                                                                           | Implemented | Finalized FreeBSD | Finalized Linux |
|:------------------------------------------------------------------------------:|:-----------:|:-----------------:|:---------------:|
| [forward-tsn-tlv-too-long](forward-tsn-tlv-too-long.pkt)                       | Yes         | Yes (Note 1)      | Yes             |
| [forward-tsn-tlv-too-short](forward-tsn-tlv-too-short.pkt)                     | Yes         | Yes (Note 2)      | Yes (Note 2)    |
| [forward-tsn-too-short](forward-tsn-too-short.pkt)                             | Yes         | Yes               | Yes             |
| [init-with-forward-tsn-tlv-too-long](init-with-forward-tsn-tlv-too-long.pkt)   | Yes         | Yes               | Yes             |
| [init-with-forward-tsn-tlv-too-short](init-with-forward-tsn-tlv-too-short.pkt) | Yes         | Yes (Note 3)      | Yes             |
| [init-with-forward-tsn-too-long](init-with-forward-tsn-too-long.pkt)           | Yes         | Yes               | Yes (Note 3)    |
| [init-with-forward-tsn-too-short](init-with-forward-tsn-too-short.pkt)         | Yes         | Yes (Note 3)      | Yes             |

# Notes
1. Instead of sending an ABORT-Chunk it silently discards the invalid Chunk.
2. packetdrill crashes with error message `packetdrill: sctp_iterator.c:81: sctp_chunks_next: Assertion chunk_length >= sizeof(struct sctp_chunk)' failed.`
3. Instead of sending an ABORT-Chunk the implementation sends an INIT-ACK-Chunk.

